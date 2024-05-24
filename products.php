<?php
session_start();
include 'config.php';

$query = "SELECT * FROM laptops";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Laptop Store</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image img {
            width: 100%;
            border-bottom: 1px solid #ddd;
        }
        .product-details {
            padding: 20px;
            text-align: center;
        }
        .product-details h3 {
            margin: 0;
            font-size: 1.5em;
        }
        .product-details p {
            margin: 10px 0;
            font-size: 1.2em;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <h1>Our Products</h1>
    <div class="products-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<div class="product-image"><img src="' . $row["image"] . '" alt="' . $row["model"] . '"></div>';
                echo '<div class="product-details">';
                echo '<h3>' . $row["model"] . '</h3>';
                echo '<p>Price: $' . $row["price"] . '</p>';
                echo '<p>CPU: ' . $row["cpu"] . '</p>';
                echo '<a href="product_details.php?id=' . $row["laptop_id"] . '" class="btn">View Details</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No products available.</p>';
        }
        $conn->close();
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
