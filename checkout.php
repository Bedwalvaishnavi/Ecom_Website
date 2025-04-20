<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p style='text-align:center;'>Your cart is empty. <a href='shop.php'>Go shopping</a></p>";
    exit;
}

// Fetch product info
$cart = $_SESSION['cart'];
$ids = implode(',', array_keys($cart));
// $sql = "SELECT * FROM products WHERE id IN ($ids)";
// $result = $conn->query($sql);
$ids = implode(',', array_map('intval', array_keys($cart))); // make sure IDs are safe
$sql = "SELECT * FROM products WHERE id IN ($ids)";
$result = $conn->query($sql);

if (!$result) {
    echo "<p style='color:red; text-align:center;'>Error fetching products: " . $conn->error . "</p>";
    exit;
}


$total = 0;
$orderItems = [];

while ($row = $result->fetch_assoc()) {
    $qty = $cart[$row['id']];
    $subtotal = $qty * $row['price'];
    $total += $subtotal;
    $orderItems[] = $row['name'] . " x" . $qty;
}

// Insert order
$itemsString = implode(", ", $orderItems);
// $stmt = $conn->prepare("INSERT INTO orders (items, total) VALUES (?, ?)");
// $stmt->bind_param("sd", $itemsString, $total);
$userId = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    $res = $conn->query("SELECT id FROM users WHERE username = '$username'");
    $user = $res->fetch_assoc();
    $userId = $user['id'];
}

$stmt = $conn->prepare("INSERT INTO orders (items, total, user_id) VALUES (?, ?, ?)");
$stmt->bind_param("sdi", $itemsString, $total, $userId);

$stmt->execute();
$stmt->close();

// Clear cart
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial;
            background: #f3f3f3;
            padding: 40px;
            text-align: center;
        }
        .box {
            background: white;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .box h2 {
            color: #4caf50;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>🎉 Order Placed Successfully!</h2>
    <p>Thank you for shopping with Blossom Boutique.</p>
    <p><strong>Order Summary:</strong></p>
    <p><?php echo $itemsString; ?></p>
    <p><strong>Total:</strong> ₹<?php echo number_format($total, 2); ?></p>
    <br>
    <a href="shop.php">← Continue Shopping</a>
</div>

</body>
</html>

