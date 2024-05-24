<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            height: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease-out;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            line-height: 1.6;
            color: #666;
        }
        .image-container {
            text-align: center;
            margin-top: 20px;
        }
        .image-container img {
            width: 600px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <?php include'includes/header.php'; ?>
    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to our website! We are dedicated to providing high-quality laptops to our customers. Our mission is to offer a wide selection of top brands and models, ensuring that you find the perfect laptop to suit your needs.</p>
        <p>At Laptop Store, we prioritize customer satisfaction above all else. Our team is committed to delivering exceptional service and support throughout your shopping experience.</p>
        <p>Whether you're a student, professional, or enthusiast, we have the right laptop for you. Explore our collection today and discover the latest in technology and innovation.</p>
        <p>Thank you for choosing Laptop Store for all your laptop needs!</p>
        <div class="image-container">
            <img src="resource/laptop-store-billboard-1548.webp" alt="Laptop Store Image">
        </div>
    </div>
    <?php include'includes/footer.php'; ?>
</body>
</html>
