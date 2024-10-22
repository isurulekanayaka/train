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

    <div class="container mx-auto p-6">
        <div class="flex flex-col md:flex-row justify-between">

            <!-- Left Section (Fare Details) -->
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md mb-6 md:mb-0">
                <h2 class="text-2xl font-bold mb-4">Fare Details</h2>

                <!-- User Info -->
                <div class="text-lg space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Total Passengers:</span>
                        <span class="text-blue-500"></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Ticket Fare (Rs):</span>
                        <span class="text-blue-500"></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Total Ticket Fare (Rs):</span>
                        <span class="text-blue-500"></span>
                    </div>
                </div>
            </div>

            <!-- Right Section (Payment) -->
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Payment</h2>
                <form method="POST" action="" class="space-y-4">

                    <!-- Cardholder Name -->
                    <div>
                        <label for="cardholder-name" class="block text-gray-700">Cardholder Name</label>
                        <input type="text" id="cardholder-name" placeholder="John Doe"
                            class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- Stripe Card Element -->
                    <div>
                        <label for="card-element" class="block text-gray-700">Card Details</label>
                        <div id="card-element" class="w-full p-2 border rounded-md"></div>
                    </div>

                    <!-- Pay Button -->
                    <button type="submit"
                        class="w-full py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600">
                        Pay Now Rs <span id="pay-now-amount"></span>
                    </button>
                </form>

                <p class="text-gray-600 text-sm mt-4">Your personal data will be used to process your order, support
                    your experience throughout this website, and for other purposes described in our privacy policy.</p>

                <div id="error-message" class="text-red-500 mt-2"></div>
                <div id="payment-status" class="text-green-500 mt-2"></div>
            </div>
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
