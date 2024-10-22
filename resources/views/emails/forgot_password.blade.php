<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <h1>Password Reset Request</h1>
    <p>Dear User,</p>
    <p>Click the link below to reset your password:</p>
    <p>
        <a href="{{ url('password/reset', [$token, $email]) }}" style="color: blue; text-decoration: underline;">Reset Password</a>
    </p>
    <p>If you did not request this email, please ignore it.</p>
    <p>Thank you!</p>
</body>

</html>
