<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user'])) {
    echo "<p style='text-align:center;'>Please <a href='login.php'>log in</a> to view your orders.</p>";
    exit;
}

$username = $_SESSION['user'];
$res = $conn->query("SELECT id FROM users WHERE username = '$username'");
$user = $res->fetch_assoc();
$userId = $user['id'];

$orders = $conn->query("SELECT * FROM orders WHERE user_id = $userId ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <style>
        body { font-family: Arial; background: #f8f8ff; padding: 40px; }
        table { width: 80%; margin: auto; background: white; border-collapse: collapse; }
        th, td { padding: 15px; border: 1px solid #ddd; text-align: center; }
        th { background: #ff6f91; color: white; }
        h2 { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>

<h2>📦 My Orders</h2>

<?php
if ($orders->num_rows > 0) {
    echo "<table>
            <tr><th>Order ID</th><th>Items</th><th>Total</th><th>Status</th><th>Date</th></tr>";

    while ($row = $orders->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['items'] . "</td>
                <td>₹" . number_format($row['total'], 2) . "</td>
                <td>" . $row['status'] . "</td>
                <td>" . $row['created_at'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align:center;'>You have no orders yet.</p>";
}

?>

</body>
</html>
