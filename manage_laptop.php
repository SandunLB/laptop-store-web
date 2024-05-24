<?php
session_start();
include 'config.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle form submission for adding or updating a laptop
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $ram = $_POST['ram'];
    $cpu = $_POST['cpu'];
    $vga = $_POST['vga'];
    $memory = $_POST['memory'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $warranty_period = $_POST['warranty_period'];
    $image = '';

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    if (isset($_POST['laptop_id']) && !empty($_POST['laptop_id'])) {
        // Update laptop
        $laptop_id = $_POST['laptop_id'];
        $query = "UPDATE laptops SET model=?, brand=?, ram=?, cpu=?, vga=?, memory=?, price=?, description=?, warranty_period=?, image=? WHERE laptop_id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssdsssi', $model, $brand, $ram, $cpu, $vga, $memory, $price, $description, $warranty_period, $image, $laptop_id);
    } else {
        // Add new laptop
        $query = "INSERT INTO laptops (model, brand, ram, cpu, vga, memory, price, description, warranty_period, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssdsss', $model, $brand, $ram, $cpu, $vga, $memory, $price, $description, $warranty_period, $image);
    }

    if ($stmt->execute()) {
        echo "Laptop successfully saved!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Handle delete request
if (isset($_GET['delete'])) {
    $laptop_id = $_GET['delete'];
    $query = "DELETE FROM laptops WHERE laptop_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $laptop_id);
    if ($stmt->execute()) {
        echo "Laptop deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch laptops for display
$query = "SELECT * FROM laptops";
$result = $conn->query($query);
$laptops = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $laptops[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Laptops</title>
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

        form, table {
            width: 80%;
            margin: auto;
            margin-bottom: 20px;
        }

        form {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #0f0;
        }

        form label {
            display: block;
            margin: 10px 0;
        }

        form input, form textarea, form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #0f0;
            background: #333;
            color: #fff;
            border-radius: 5px;
        }

        form input[type="file"] {
            padding: 3px;
        }

        form input[type="submit"] {
            background: #0f0;
            color: #000;
            cursor: pointer;
            transition: background 0.3s;
        }

        form input[type="submit"]:hover {
            background: #0a0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #0f0;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #0a0;
        }

        table td img {
            width: 100px;
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
    <h1 class="neon">Manage Laptops</h1>

    <!-- Laptop Form -->
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="laptop_id" id="laptop_id">
        <label>Model: <input type="text" name="model" id="model" required></label><br>
        <label>Brand: <input type="text" name="brand" id="brand" required></label><br>
        <label>RAM: <input type="text" name="ram" id="ram" required></label><br>
        <label>CPU: <input type="text" name="cpu" id="cpu" required></label><br>
        <label>VGA: <input type="text" name="vga" id="vga" required></label><br>
        <label>Memory: <input type="text" name="memory" id="memory" required></label><br>
        <label>Price: <input type="number" step="0.01" name="price" id="price" required></label><br>
        <label>Description: <textarea name="description" id="description" required></textarea></label><br>
        <label>Warranty Period: <input type="text" name="warranty_period" id="warranty_period" required></label><br>
        <label>Image: <input type="file" name="image" id="image" accept="image/*"></label><br>
        <input type="submit" value="Save Laptop">
    </form>

    <!-- Laptop List -->
    <h2 class="neon">Laptop List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Brand</th>
            <th>RAM</th>
            <th>CPU</th>
            <th>VGA</th>
            <th>Memory</th>
            <th>Price</th>
            <th>Description</th>
            <th>Warranty Period</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($laptops as $laptop): ?>
            <tr>
                <td><?php echo $laptop['laptop_id']; ?></td>
                <td><?php echo $laptop['model']; ?></td>
                <td><?php echo $laptop['brand']; ?></td>
                <td><?php echo $laptop['ram']; ?></td>
                <td><?php echo $laptop['cpu']; ?></td>
                <td><?php echo $laptop['vga']; ?></td>
                <td><?php echo $laptop['memory']; ?></td>
                <td><?php echo $laptop['price']; ?></td>
                <td><?php echo $laptop['description']; ?></td>
                <td><?php echo $laptop['warranty_period']; ?></td>
                <td><img src="<?php echo $laptop['image']; ?>" alt="Laptop Image"></td>
                <td class="action-links">
                    <a href="javascript:void(0);" onclick="editLaptop(<?php echo htmlspecialchars(json_encode($laptop)); ?>)">Edit</a> |
                    <a href="?delete=<?php echo $laptop['laptop_id']; ?>" onclick="return confirm('Are you sure you want to delete this laptop?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function editLaptop(laptop) {
            document.getElementById('laptop_id').value = laptop.laptop_id;
            document.getElementById('model').value = laptop.model;
            document.getElementById('brand').value = laptop.brand;
            document.getElementById('ram').value = laptop.ram;
            document.getElementById('cpu').value = laptop.cpu;
            document.getElementById('vga').value = laptop.vga;
            document.getElementById('memory').value = laptop.memory;
            document.getElementById('price').value = laptop.price;
            document.getElementById('description').value = laptop.description;
            document.getElementById('warranty_period').value = laptop.warranty_period;
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
