@extends('layout.user-layout')

@section('user-content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/checkout.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container p-6 mx-auto">
        <div class="flex flex-col justify-between md:flex-row">

<!-- Left Section (Fare Details) -->
<div class="w-full p-6 mb-6 bg-white rounded-lg shadow-lg md:w-1/2 md:mb-0">
    <h2 class="mb-2 text-4xl font-extrabold text-blue-600">Fare Details</h2>
    <p class="mb-4 text-lg text-gray-700">Explore your ticket details and discover everything from passenger counts to fare breakdowns. Get ready for an extraordinary travel experience that awaits you!</p>

    <!-- User Info -->
    <div class="mt-6 space-y-4 text-lg">
        <div class="flex items-center justify-between p-2 border-b border-gray-200">
            <span class="font-semibold">Total Passengers:</span>
            <span class="font-medium text-blue-500">0</span>
        </div>
        <div class="flex items-center justify-between p-2 border-b border-gray-200">
            <span class="font-semibold">Ticket Fare (Rs):</span>
            <span class="font-medium text-blue-500">0.00</span>
        </div>
        <div class="flex items-center justify-between p-2 border-b border-gray-200">
            <span class="font-semibold">Total Ticket Fare (Rs):</span>
            <span class="font-medium text-blue-500">0.00</span>
        </div>
    </div>
</div>


           <!-- Right Section (Payment) -->
           <div class="w-full p-6 bg-white rounded-lg shadow-lg md:w-1/2">
            <h2 class="mb-2 text-4xl font-extrabold text-center text-blue-600">Your Ticket Awaits!</h2>
            <p class="mb-6 text-lg text-center text-gray-700">Finalize your payment to unlock your travel experience.</p>
            
            <form method="POST" action="" class="space-y-6">
                <!-- Cardholder Name -->
                <div>
                    <label for="cardholder-name" class="block font-semibold text-gray-700">Cardholder Name</label>
                    <input type="text" id="cardholder-name" placeholder="John Doe"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
        
                <!-- Stripe Card Element -->
                <div>
                    <label for="card-element" class="block font-semibold text-gray-700">Card Details</label>
                    <div id="card-element" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></div>
                </div>
        
                <!-- Pay Button -->
                <button type="submit" class="w-full py-3 font-bold text-white bg-blue-600 rounded-lg shadow">
                    Pay Now Rs <span id="pay-now-amount"></span>
                </button>
            </form>
        
            <p class="mt-4 text-sm text-gray-600">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
        
            <div id="error-message" class="mt-2 text-red-500"></div>
            <div id="payment-status" class="mt-2 text-green-500"></div>
        </div>
        

    </div>

</body>



<script>
    // Initialize Stripe with your publishable key
    var stripe = Stripe('pk_test_51Q4a4LIXuehbQgrE9xRpgBI3Ng44VJNv8hmKJHWs26bFcbpCG4U6jaE7QTj4BqQU8EIEi9Xw36KvUnFFZOaLKvm600QRtrnwD3');
    var elements = stripe.elements();

    // Create an instance of the card Element.
    var card = elements.create('card');

    // Add an instance of the card Element into the `card-element` div.
    card.mount('#card-element');

    // Handle form submission
    var form = document.getElementById('submitBtn');
    form.addEventListener('click', function(event) {
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
                // Send paymentMethod.id to your server for confirmation
                fetch('/create-payment.php', { // Replace with the actual path to your PHP file
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            payment_method_id: result.paymentMethod.id
                        }),
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        if (data.error) {
                            document.getElementById('error-message').textContent = data.error;
                        } else {
                            document.getElementById('payment-status').textContent = 'Payment successful!';
                        }
                    });
            }
        });
    });
</script>


@endsection
