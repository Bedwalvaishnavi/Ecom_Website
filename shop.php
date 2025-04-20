<?php
session_start();
?>

<?php
include 'includes/db.php';
?>
<?php
// session_start();
// include 'includes/db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]++;
    } else {
        $_SESSION['cart'][$productId] = 1;
    }

    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop | Blossom Boutique</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff8f0;
            margin: 0;
        }
        header, nav {
            background-color: #ff6f91;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #ffa07a;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .shop-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 30px;
        }
        .product {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 15px;
            width: 220px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .product:hover {
            transform: scale(1.03);
        }
        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .product h3 {
            margin: 10px 0;
        }
        .product p {
            padding: 0 10px;
            color: #555;
        }
        .product .price {
            color: #ff6f91;
            font-weight: bold;
            margin: 10px 0;
        }
        .product button {
            background: #ff6f91;
            color: white;
            padding: 10px 15px;
            border: none;
            margin-bottom: 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>🌸 Blossom Boutique - Shop 🌸</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <!-- <a href="login.php">Login</a> -->
    <?php if (isset($_SESSION['user'])): ?>
    <span style="color:white;">Hi, <?php echo $_SESSION['user']; ?></span>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
<?php endif; ?>
<?php if (isset($_SESSION['user'])): ?>
    <a href="my-orders.php">My Orders</a>
<?php endif; ?>

    
</nav>

<div class="shop-container">
<?php
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>
                <img src='uploads/" . $row['image'] . "' alt='" . $row['name'] . "'>
                <h3>" . $row['name'] . "</h3>
                <p>" . $row['description'] . "</p>
                <div class='price'>₹" . $row['price'] . "</div>
                <form method='post' action='shop.php'>
                    <input type='hidden' name='product_id' value='" . $row['id'] . "'>
                    <button type='submit' name='add_to_cart'>Add to Cart</button>
                </form>

              </div>";
    }
} else {
    echo "<p>No products found!</p>";
}
?>
</div>




</body>
</html>
