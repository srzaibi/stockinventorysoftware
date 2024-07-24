<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'admin') {
                header('Location: admin/dashboard.php');
            } elseif ($row['role'] == 'salesman') {
                header('Location: salesman/search_product.php');
            } elseif ($row['role'] == 'stock_maintainer') {
                header('Location: stock_maintainer/add_stock.php');
            }
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
