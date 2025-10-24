<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Painting Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .painting-image {
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            line-height: 1.6;
            color: #555;
        }

        .info {
            background: #f9f9f9;
            padding: 10px 15px;
            border-radius: 8px;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2>🎨 New Painting Enquiry</h2>

        <h3>{{ $details['painting']->title }}</h3>

        @if(isset($details['painting']->images[0]))
            <img src="{{ asset('storage/' . $details['painting']->images[0]) }}" alt="Painting Image"
                class="painting-image">
        @endif

        <p><strong>Description:</strong> {{ $details['painting']->description ?? 'No description available' }}</p>
        <p><strong>Dimensions:</strong> {{ $details['painting']->dimensions ?? 'Not specified' }}</p>

        <div class="info">
            <p><strong>From:</strong> {{ $details['name'] }}</p>
            <p><strong>Mobile:</strong> {{ $details['mobile'] }}</p>
            <p><strong>Email:</strong> {{ $details['email'] }}</p>
            <p><strong>Message:</strong> {{ $details['messageContent'] }}</p>
        </div>

        <p style="margin-top: 20px; color:#777; font-size: 13px;">
            — Sent automatically from Yashwant Garud Art Gallery Website
        </p>
    </div>
</body>

</html>