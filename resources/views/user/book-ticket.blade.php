@extends('layout.user-layout')

@section('user-content')
    <div class="container w-full p-5 mx-auto">
        <div class="mb-5 title-area">
            <div class="title">
                <h2 class="text-2xl font-bold">Buy Your Seat</h2>
                <span class="text-gray-500">Dashboard / Buy Your Seat / Reserve Seat</span>
            </div>
        </div>
        <div class="flex flex-wrap space-y-6 md:space-y-0 md:flex-nowrap gap-5 p-6 bg-gray-50">
            <!-- Left side: User & Train Details -->
            <div class="container mx-auto p-6 w-7/12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-1">

                    <!-- Column 1: User & Fare Details -->
                    <div class="w-full p-6 bg-white shadow-md rounded-lg">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">User & Fare Details</h2>

                        <!-- User Details Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-blue-500">User Details</h3>
                            <div class="space-y-4 mt-3">
                                <div class="flex items-center">
                                    <i class="fas fa-user text-blue-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Full Name:</span>
                                    <span class="ml-auto text-gray-800">{{ $user->full_name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone-alt text-green-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Phone Number:</span>
                                    <span class="ml-auto text-gray-800">{{ $user->contact }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Fare Details Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-blue-500">Train Fare</h3>
                            <div class="space-y-4 mt-3">
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">1st Class:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->train->fare1stClass }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">2nd Class:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->train->fare2ndClass }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-yellow-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">3rd Class:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->train->fare3rdClass }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2: Train Details -->
                    <div class="w-full p-6 bg-white shadow-md rounded-lg">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Train Details</h2>

                        <!-- Train Details Section -->
                        <div class="mb-6">
                            <div class="space-y-4 mt-3">
                                <div class="flex items-center">
                                    <i class="fas fa-train text-purple-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Train Name:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->train->trainName }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-hashtag text-orange-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Train Number:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->train->trainNumber }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-red-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Start Point:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->start_station }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-flag-checkered text-teal-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Destination Point:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->end_station }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-blue-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Arrival Time:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->time }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-blue-400 mr-3"></i>
                                    <span class="text-gray-600 font-semibold">Departure Time:</span>
                                    <span class="ml-auto text-gray-800">{{ $train->end }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Right Side: Passenger Information -->
            <div class="w-full md:w-5/12 p-6 bg-white shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-900">Passenger Information</h2>

                <!-- Form Start -->
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf

                    <!-- Passenger Count -->
                    <div class="mb-6">
                        <label for="noOfUsers" class="block text-gray-700 font-semibold mb-2">Number of Passengers</label>
                        <input type="number" id="noOfUsers" name="noOfUsers"
                            class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter number of passengers" oninput="updatePrice()" required>
                    </div>

                    <!-- Ticket Class Selection -->
                    <div class="mb-6">
                        <label for="ticketClass" class="block text-gray-700 font-semibold mb-2">Select Ticket Class</label>
                        <select id="ticketClass" name="ticketClass"
                            class="mt-1 py-2 px-4 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            onchange="updatePrice()" required>
                            <option value="" disabled selected>Select a Class</option>
                            <option value="1st Class">1st Class</option>
                            <option value="2nd Class">2nd Class</option>
                            <option value="3rd Class">3rd Class</option>
                        </select>
                    </div>

                    <!-- Price Summary -->
                    <div class="bg-blue-50 p-5 rounded-lg shadow-sm">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-gray-600">Travel Date:</span>
                            <span class="text-gray-800 font-semibold">{{ $date }}</span>
                            <input type="hidden" name="date" value="{{ $date }}">
                        </div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-gray-600">Ticket Fare:</span>
                            <span class="text-gray-800 font-semibold">Rs. <span id="classPrice">0</span></span>
                            <input type="hidden" name="classPrice" id="hiddenClassPrice" value="0">
                        </div>
                        <div class="flex justify-between items-center text-green-600 font-bold text-lg">
                            <span>Total Fare:</span>
                            <span>Rs. <span id="totalPrice">0</span></span>
                            <input type="hidden" name="totalPrice" id="hiddenTotalPrice" value="0">
                        </div>
                    </div>

                    <!-- Hidden Input -->
                    <input type="hidden" value="{{ $train->id }}" name="train_station_id">

                    <!-- Checkout Button -->
                    <div class="flex justify-end mt-8">
                        <button
                            class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none transition duration-300">
                            Proceed to Checkout
                        </button>
                    </div>
                </form>
                <!-- Form End -->
            </div>


        </div>
        <script>
            // Example fares for each class from backend PHP values
            const fare1stClass = {{ $train->train->fare1stClass }};
            const fare2ndClass = {{ $train->train->fare2ndClass }};
            const fare3rdClass = {{ $train->train->fare3rdClass }};
        
            function updatePrice() {
                const noOfUsers = document.getElementById("noOfUsers").value;
                const ticketClass = document.getElementById("ticketClass").value;
                let classFare = 0;
        
                // Determine fare based on the selected class
                switch (ticketClass) {
                    case "1st Class":
                        classFare = fare1stClass;
                        break;
                    case "2nd Class":
                        classFare = fare2ndClass;
                        break;
                    case "3rd Class":
                        classFare = fare3rdClass;
                        break;
                    default:
                        classFare = 0;
                        break;
                }
        
                // Update the fare for one person and total fare for all passengers
                document.getElementById("classPrice").innerText = classFare;
                const totalFare = classFare * noOfUsers;
                document.getElementById("totalPrice").innerText = totalFare;
        
                // Update hidden inputs for submission
                document.getElementById("hiddenClassPrice").value = classFare;
                document.getElementById("hiddenTotalPrice").value = totalFare;
            }
        </script>
    @endsection
