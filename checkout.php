<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $payment_method = $_POST['payment_method'];
    $payment_status = 'Pending';
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    
    $total_price = 0;
    foreach ($_SESSION['cart'] as $id => $details) {
        $total_price += $details['quantity'] * $details['price'];
    }

    // Insert order into orders table
    $order_query = "INSERT INTO orders (user_id, total_price) VALUES ($user_id, $total_price)";
    if ($conn->query($order_query) === TRUE) {
        $order_id = $conn->insert_id;

        // Insert each cart item into order_items table
        foreach ($_SESSION['cart'] as $id => $details) {
            $order_item_query = "INSERT INTO order_items (order_id, laptop_id, quantity, price) VALUES ($order_id, $id, ".$details['quantity'].", ".$details['price'].")";
            $conn->query($order_item_query);
        }

        // Insert order details into order_details table
        $order_details_query = "INSERT INTO order_details (order_id, payment_method, payment_status, address_line1, address_line2, city, state, postal_code, country) VALUES ($order_id, '$payment_method', '$payment_status', '$address_line1', '$address_line2', '$city', '$state', '$postal_code', '$country')";
        $conn->query($order_details_query);

        // Clear the cart
        unset($_SESSION['cart']);

        echo "<script>alert('Order placed successfully!');window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Failed to place order. Please try again.');</script>";
    }
}

$total_price = 0;
foreach ($_SESSION['cart'] as $id => $details) {
    $total_price += $details['quantity'] * $details['price'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Laptop Store</title>
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
        .checkout {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .checkout h1, .checkout h3 {
            text-align: center;
        }
        .checkout form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .checkout form .form-group {
            width: 48%;
            margin-bottom: 15px;
        }
        .checkout form label {
            display: block;
            margin-bottom: 5px;
        }
        .checkout form input, .checkout form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .checkout form button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
        }
        .checkout form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="checkout">
        <h1>Checkout</h1>
        <h3>Total Price: $<?php echo number_format($total_price, 2); ?></h3>
        <form method="post">
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address_line1">Address Line 1</label>
                <input type="text" id="address_line1" name="address_line1" required>
            </div>
            <div class="form-group">
                <label for="address_line2">Address Line 2</label>
                <input type="text" id="address_line2" name="address_line2">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" required>
            </div>
            <button type="submit">Place Order</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
