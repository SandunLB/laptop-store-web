<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
    $id = intval($_POST['id']);
    unset($_SESSION['cart'][$id]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $quantity = intval($_POST['quantity']);
    if ($quantity > 0) {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    } else {
        unset($_SESSION['cart'][$id]);
    }
}

$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Laptop Store</title>
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
        .cart {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .cart table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart th, .cart td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .cart th {
            text-align: left;
            background-color: #007bff;
            color: #fff;
        }
        .cart td {
            text-align: center;
        }
        .cart td input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .cart button {
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            border: none;
        }
        .cart button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="cart">
        <h1>Your Cart</h1>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['cart'] as $id => $details):
                        $query = "SELECT model, price FROM laptops WHERE laptop_id = $id";
                        $result = $conn->query($query);
                        $product = $result->fetch_assoc();
                        $total_price += $details['quantity'] * $details['price'];
                    ?>
                        <tr>
                            <td><?php echo $product['model']; ?></td>
                            <td>
                                <form method="post" style="display: inline;">
                                    <input type="number" name="quantity" value="<?php echo $details['quantity']; ?>" min="1">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="update">Update</button>
                                </form>
                            </td>
                            <td>$<?php echo number_format($details['price'] * $details['quantity'], 2); ?></td>
                            <td>
                                <form method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="remove">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total Price: $<?php echo number_format($total_price, 2); ?></h3>
            <button onclick="window.location.href='checkout.php'">Proceed to Checkout</button>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
