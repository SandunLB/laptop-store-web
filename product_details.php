<?php
session_start();
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM laptops WHERE laptop_id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit();
    }
} else {
    echo "Invalid product ID!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = intval($_POST['quantity']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = [
            'quantity' => $quantity,
            'price' => $product['price']
        ];
    }
    header('Location: cart.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['model']; ?> - Laptop Store</title>
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
        .product-details {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .product-image img {
            width: 100%;
            border-radius: 10px;
        }
        .product-info {
            margin-top: 20px;
        }
        .product-info h2 {
            font-size: 2em;
            margin: 0;
        }
        .product-info p {
            font-size: 1.2em;
            margin: 10px 0;
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
        form {
            margin-top: 20px;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="product-details">
        <div class="product-image">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['model']; ?>">
        </div>
        <div class="product-info">
            <h2><?php echo $product['model']; ?></h2>
            <p><strong>Brand:</strong> <?php echo $product['brand']; ?></p>
            <p><strong>RAM:</strong> <?php echo $product['ram']; ?></p>
            <p><strong>CPU:</strong> <?php echo $product['cpu']; ?></p>
            <p><strong>VGA:</strong> <?php echo $product['vga']; ?></p>
            <p><strong>Memory:</strong> <?php echo $product['memory']; ?></p>
            <p><strong>Price:</strong> $<?php echo $product['price']; ?></p>
            <p><strong>Warranty Period:</strong> <?php echo $product['warranty_period']; ?></p>
            <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
            <form method="post">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" class="btn">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
