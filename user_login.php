<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: index.php");
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that email!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
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

        input[type="email"], input[type="password"] {
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
    <h1 class="neon">User Login</h1>

    <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
$conn->close();
?>
