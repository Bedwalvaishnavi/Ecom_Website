<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['username'];
            header("Location: shop.php");
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
    <style>
        body { font-family: Arial; background: #fff8f0; text-align: center; padding: 40px; }
        form { background: white; padding: 30px; display: inline-block; border-radius: 10px; }
        input { padding: 10px; width: 250px; margin: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #ff6f91; color: white; padding: 10px 20px; border: none; border-radius: 5px; }
        .error { color: red; }
    </style>
</head>
<body>

<h2>🔐 User Login</h2>

<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
