<?php
session_start();
include 'config.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle delete request
if (isset($_GET['delete'])) {
    $order_id = $_GET['delete'];
    $query = "DELETE FROM orders WHERE order_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $order_id);
    if ($stmt->execute()) {
        echo "Order deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Handle update request
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $query = "UPDATE orders SET status=? WHERE order_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $status, $order_id);
    if ($stmt->execute()) {
        echo "Order status updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


// Fetch orders for display
$query = "SELECT o.order_id, o.user_id, oi.laptop_id, oi.quantity, o.total_price, o.status, o.order_date, u.username, u.email, u.address, l.model 
          FROM orders o 
          JOIN users u ON o.user_id = u.user_id 
          JOIN order_items oi ON o.order_id = oi.order_id 
          JOIN laptops l ON oi.laptop_id = l.laptop_id";

$result = $conn->query($query);
$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #0f0;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #0f0;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: #0a0;
        }

        a {
            color: #0f0;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0a0;
        }

        .neon {
            text-shadow: 0 0 5px #0f0, 0 0 10px #0f0, 0 0 20px #0f0, 0 0 40px #0f0, 0 0 80px #0f0;
        }

        .action-links a {
            margin-right: 10px;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1 class="neon">View Orders</h1>

    <h2 class="neon">Order List</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Email</th>
            <th>Address</th>
            <th>Laptop Model</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['order_id']; ?></td>
                <td><?php echo $order['username']; ?></td>
                <td><?php echo $order['email']; ?></td>
                <td><?php echo $order['address']; ?></td>
                <td><?php echo $order['model']; ?></td>
                <td><?php echo $order['quantity']; ?></td>
                <td><?php echo $order['total_price']; ?></td>
                <td><?php echo $order['status']; ?></td>
                <td><?php echo $order['order_date']; ?></td>
                <td class="action-links">
                    <a href="?delete=<?php echo $order['order_id']; ?>" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                    <form method="post" action="">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        <select name="status">
                            <option value="Pending" <?php if ($order['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                            <option value="Shipped" <?php if ($order['status'] == 'Shipped') echo 'selected'; ?>>Shipped</option>
                            <option value="Delivered" <?php if ($order['status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
                            <option value="Cancelled" <?php if ($order['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                        </select>
                        <input type="submit" name="update_status" value="Update">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
