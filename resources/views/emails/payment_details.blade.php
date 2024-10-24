<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 8px 0;
            border-bottom: 1px solid #eaeaea;
        }
        li:last-child {
            border-bottom: none;
        }
        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Details</h1>

        <p>Dear {{ $paymentDetail->user->name }},</p>

        <p>Your payment has been successfully processed. Below are your details:</p>

        <ul>
            <li><strong>Number of Users:</strong> {{ $paymentDetail->noOfUsers }}</li>
            <li><strong>Ticket Class:</strong> {{ $paymentDetail->ticketClass }}</li>
            <li><strong>Date:</strong> {{ $paymentDetail->date }}</li>
            <li><strong>Class Price:</strong> ${{ number_format($paymentDetail->classPrice, 2) }}</li>
            <li><strong>Total Price:</strong> ${{ number_format($paymentDetail->totalPrice, 2) }}</li>
            <li><strong>Train Station ID:</strong> {{ $paymentDetail->train_station_id }}</li>
        </ul>

        <p>
            View on map: 
            <a href="https://www.google.com/maps?q={{ $lat }},{{ $long }}" target="_blank" rel="noopener noreferrer">
                Click here to view location
            </a>
        </p>

        <p>Thank you for choosing our service!</p>
        
        <footer>
            <p>If you have any questions, feel free to contact us.</p>
        </footer>
    </div>
</body>
</html>
