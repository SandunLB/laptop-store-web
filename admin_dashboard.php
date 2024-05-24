<?php
session_start();
include 'config.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch counts for analysis
$laptop_count_query = "SELECT COUNT(*) AS count FROM laptops";
$order_count_query = "SELECT COUNT(*) AS count FROM orders";
$user_count_query = "SELECT COUNT(*) AS count FROM users";

$laptop_count_result = $conn->query($laptop_count_query);
$order_count_result = $conn->query($order_count_query);
$user_count_result = $conn->query($user_count_query);

$laptop_count = $laptop_count_result->fetch_assoc()['count'];
$order_count = $order_count_result->fetch_assoc()['count'];
$user_count = $user_count_result->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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

        .neon {
            text-shadow: 0 0 5px #0f0, 0 0 10px #0f0, 0 0 20px #0f0, 0 0 40px #0f0, 0 0 80px #0f0;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .card {
            background: rgba(0, 0, 0, 0.8);
            border: 1px solid #0f0;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            text-align: center;
            box-shadow: 0 0 10px #0f0;
            flex: 1 1 300px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h3 {
            color: #0f0;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 24px;
        }

        a {
            color: #0f0;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0a0;
        }
    </style>
</head>
<body>
    <h1 class="neon">Admin Dashboard</h1>

    <div class="dashboard">
        <div class="card">
            <h3>Laptops</h3>
            <p><?php echo $laptop_count; ?></p>
            <a href="manage_laptop.php">Manage Laptops</a>
        </div>
        <div class="card">
            <h3>Orders</h3>
            <p><?php echo $order_count; ?></p>
            <a href="view_orders.php">View Orders</a>
        </div>
        <div class="card">
            <h3>Users</h3>
            <p><?php echo $user_count; ?></p>
            <a href="view_users.php">View Users</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
