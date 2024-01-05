<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        /* Add your CSS styles here */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        h1 {
            color: #3e2093;
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 12px;
            color: #555;
        }

        .icon {
            display: inline-block;
            width: 60px;
            height: 60px;
            background-color: #3e2093;
            color: #fff;
            font-size: 32px;
            line-height: 60px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .thank-you-msg {
            font-size: 24px;
            font-weight: bold;
            color: #3e2093;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">&#10003;</div>
        <h1>Thank You!</h1>
        <p class="thank-you-msg">We received your message.</p>
        <p>We will get back to you shortly.</p>
    </div>

    <script>
        // Redirect back to index.html after 3 seconds
        setTimeout(function() {
            window.location.href = "index.html";
        }, 2000);
    </script>
</body>
</html>
