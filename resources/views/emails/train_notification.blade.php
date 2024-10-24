<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Notification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            font-size: 24px;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #34495e;
            margin-bottom: 15px;
        }
        .highlight {
            font-weight: bold;
            color: #000;
        }
        .footer {
            font-size: 14px;
            color: #95a5a6;
            text-align: center;
            margin-top: 30px;
        }
        .footer a {
            color: #3498db;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Train {{ $trainDetails['status'] === 'delayed' ? 'Delay' : 'Cancellation' }} Notification</h1>
        <p>Dear <span class="highlight">{{ $trainDetails['user']->full_name }}</span>,</p>
        <p>We regret to inform you that the train <span class="highlight">{{ $trainDetails['train']->trainName }}</span> scheduled for <span class="highlight">{{ $trainDetails['departureDate'] }}</span> is currently <span class="highlight">{{ $trainDetails['status'] }}</span>.</p>
    
        @if($trainDetails['status'] === 'delayed')
            <p>Reason for the delay: <span class="highlight">{{ $trainDetails['reason'] }}</span></p>
            <p>New Estimated Time: <span class="highlight">{{ $trainDetails['time'] }}</span></p>
        @else
            <p>Reason for the cancellation: <span class="highlight">{{ $trainDetails['reason'] }}</span></p>
            <p style="color: red;">We sincerely apologize for the inconvenience caused. To receive your refund, kindly visit us within the next two days. Our dedicated team is ready to assist you and ensure a quick, hassle-free process.</p>
        @endif
    
        <p>Thank you for your patience and understanding.</p>
        <p class="footer">Best Regards,<br>Train Service Management</p>
    </div>
    
</body>
</html>
