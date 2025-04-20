<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert into users table
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['user'] = $username;
        header("Location: shop.php");
        exit;
    } else {
        $error = "Username or email already exists.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { font-family: Arial; background: #fff8f0; text-align: center; padding: 40px; }
        form { background: white; padding: 30px; display: inline-block; border-radius: 10px; }
        input { padding: 10px; width: 250px; margin: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #ff6f91; color: white; padding: 10px 20px; border: none; border-radius: 5px; }
        .error { color: red; }
    </style>
</head>
<body>

<h2>👤 Create Account</h2>

<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email Address" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>

</body>
</html>
