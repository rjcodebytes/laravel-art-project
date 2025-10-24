<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #fff; padding: 24px; border-radius: 8px;">
        <h2 style="color:#333;">New Contact Message</h2>
        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Artwork Interested:</strong> {{ $artwork }}</p>
        <p><strong>Message:</strong></p>
        <p style="white-space: pre-wrap;">{{ $userMessage }}</p>
        <hr>
        <p style="font-size:12px; color:#777;">Sent from IP: {{ $ip }}</p>
    </div>
</body>
</html>
