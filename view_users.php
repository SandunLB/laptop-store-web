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
    $user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    if ($stmt->execute()) {
        echo "User deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch users for display
$query = "SELECT * FROM users";
$result = $conn->query($query);
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
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
    </style>
</head>
<body>
    <h1 class="neon">View Users</h1>

    <h2 class="neon">User List</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['user_id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['address']; ?></td>
                <td class="action-links">
                    <a href="?delete=<?php echo $user['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
