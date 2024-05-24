<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $address = $_POST['address'];

    $query = "INSERT INTO users (username, email, password, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $username, $email, $password, $address);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: user_login.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #0f0;
        }

        .neon {
            text-shadow: 0 0 5px #0f0, 0 0 10px #0f0, 0 0 20px #0f0, 0 0 40px #0f0, 0 0 80px #0f0;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #0f0;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px #0f0;
        }

        label, input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        label {
            color: #0f0;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            padding: 10px;
            background: #222;
            border: 1px solid #0f0;
            color: #fff;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #0f0;
            color: #000;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0a0;
        }
    </style>
</head>
<body>
    <h1 class="neon">User Registration</h1>

    <form method="post" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>

        <input type="submit" value="Register">
    </form>
</body>
</html>

<?php
$conn->close();
?>
