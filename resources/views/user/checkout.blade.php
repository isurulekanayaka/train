@extends('layout.user-layout')

@section('user-content')
    <!-- Success/Error Alerts -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <body class="bg-gray-100">

        <div class="container p-6 mx-auto">
            <div class="flex flex-col justify-between md:flex-row gap-10">

                <!-- Left Section (Fare Details) -->
                <div class="w-full p-6 mb-6 bg-white rounded-lg shadow-lg md:w-1/2 md:mb-0">
                    <h2 class="mb-2 text-4xl font-extrabold text-blue-600">Fare Details</h2>
                    <p class="mb-4 text-lg text-gray-700">Explore your ticket details and discover everything from passenger
                        counts to fare breakdowns. Get ready for an extraordinary travel experience that awaits you!</p>

                    <!-- User Info -->
                    <div class="mt-6 space-y-4 text-lg">
                        <div class="flex items-center justify-between p-2 border-b border-gray-200">
                            <span class="font-semibold">Total Passengers:</span>
                            <span class="font-medium text-blue-500">{{ $noOfUsers }}</span>
                        </div>
                        <div class="flex items-center justify-between p-2 border-b border-gray-200">
                            <span class="font-semibold">Ticket Fare (Rs):</span>
                            <span class="font-medium text-blue-500">{{ $classPrice }}</span>
                        </div>
                        <div class="flex items-center justify-between p-2 border-b border-gray-200">
                            <span class="font-semibold">Total Ticket Fare (Rs):</span>
                            <span class="font-medium text-blue-500">{{ $totalPrice }}</span>
                        </div>
                    </div>
                </div>


                <!-- Right Section (Payment) -->
                <div class="w-full p-6 bg-white rounded-lg shadow-lg md:w-1/2">
                    <h2 class="mb-2 text-4xl font-extrabold text-center text-blue-600">Your Ticket Awaits!</h2>
                    <p class="mb-6 text-lg text-center text-gray-700">Finalize your payment to unlock your travel
                        experience.</p>

                    <form id="payment-form" method="POST" action="" class="space-y-6">
                        <!-- Cardholder Name -->
                        <div>
                            <label for="cardholder-name" class="block font-semibold text-gray-700">Cardholder Name</label>
                            <input type="text" id="cardholder-name" placeholder="John Doe"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Stripe Card Element -->
                        <div>
                            <label for="card-element" class="block font-semibold text-gray-700">Card Details</label>
                            <div id="card-element"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <!-- Pay Button -->
                        <button type="submit" id="submitBtn"
                            class="w-full py-3 font-bold text-white bg-blue-600 rounded-lg shadow">
                            Pay Now Rs <span id="pay-now-amount">{{ $totalPrice }}</span>
                        </button>
                    </form>

                    <p class="mt-4 text-sm text-gray-600">Your personal data will be used to process your order, support
                        your experience throughout this website, and for other purposes described in our privacy policy.</p>

                    <div id="error-message" class="mt-2 text-red-500"></div>
                    <div id="payment-status" class="mt-2 text-green-500"></div>
                </div>

                <!-- Custom Popup Modal -->
                <div id="custom-popup" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
                        <h2 class="text-lg font-bold text-gray-800">Enter Your Password</h2>
                        <p class="mt-2 text-gray-600">Please enter your password to confirm the payment:</p>
                        <form action="{{ route('payment') }}" method="POST">
                            @csrf
                            <input type="password" id="password-input" placeholder="Enter your password" name="password"
                                class="w-full p-3 mt-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            <input type="hidden" value="{{ $noOfUsers }}" name="noOfUsers">
                            <input type="hidden" value="{{ $ticketClass }}" name="ticketClass">
                            <input type="hidden" value="{{ $date }}" name="date">
                            <input type="hidden" value="{{ $classPrice }}" name="classPrice">
                            <input type="hidden" value="{{ $totalPrice }}" name="totalPrice">
                            <input type="hidden" value="{{ $train_station_id }}" name="train_station_id">
                            <input type="hidden" name="lat" id="lat">
                            <input type="hidden" name="long" id="long">
                            <div class="mt-4 flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 font-bold text-white bg-blue-600 rounded-lg">Submit</button>
                                <button id="close-popup" type="button"
                                    class="ml-2 px-4 py-2 text-gray-600 bg-gray-200 rounded-lg">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                <script>
                    // Initialize Stripe with your publishable key
                    var stripe = Stripe(
                        'pk_test_51Q4a4LIXuehbQgrE9xRpgBI3Ng44VJNv8hmKJHWs26bFcbpCG4U6jaE7QTj4BqQU8EIEi9Xw36KvUnFFZOaLKvm600QRtrnwD3'
                    );
                    var elements = stripe.elements();

                    // Create an instance of the card Element.
                    var card = elements.create('card');

                    // Add an instance of the card Element into the `card-element` div.
                    card.mount('#card-element');

                    // Handle form submission
                    var form = document.getElementById('payment-form');
                    form.addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent the default button submission

                        // Create a payment method
                        stripe.createPaymentMethod({
                            type: 'card',
                            card: card,
                            billing_details: {
                                name: document.getElementById('cardholder-name').value
                            }
                        }).then(function(result) {
                            if (result.error) {
                                // Show error in the form
                                document.getElementById('error-message').textContent = result.error.message;
                            } else {
                                // Open the custom popup
                                document.getElementById('custom-popup').classList.remove('hidden');

                                // Close popup functionality
                                document.getElementById('close-popup').onclick = function() {
                                    document.getElementById('custom-popup').classList.add(
                                        'hidden'); // Hide the popup
                                };
                            }
                        });
                    });
                </script>

                {{-- map  --}}
                <script>
                    // Automatically call getLocation when the page loads
                    window.onload = function() {
                        getLocation();
                    };

                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(setPosition, showError);
                        } else {
                            alert("Geolocation is not supported by this browser.");
                        }
                    }

                    function setPosition(position) {
                        document.getElementById('lat').value = position.coords.latitude;
                        document.getElementById('long').value = position.coords.longitude;
                    }

                    function showError(error) {
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                alert("User denied the request for Geolocation.");
                                break;
                            case error.POSITION_UNAVAILABLE:
                                alert("Location information is unavailable.");
                                break;
                            case error.TIMEOUT:
                                alert("The request to get user location timed out.");
                                break;
                            case error.UNKNOWN_ERROR:
                                alert("An unknown error occurred.");
                                break;
                        }
                    }
                </script>
            </div>
        </div>


    </body>
@endsection
