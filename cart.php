<?php
session_start();
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial;
            background: #fff8f0;
            padding: 30px;
        }
        table {
            width: 80%;
            margin: auto;
            background: white;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #ff6f91;
            color: white;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            text-align: right;
            padding: 20px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">🛒 Your Shopping Cart</h2>

<?php
$total = 0;

// if (!empty($_SESSION['cart'])) {
//     $ids = implode(',', array_keys($_SESSION['cart']));
//     $sql = "SELECT * FROM products WHERE id IN ($ids)";
//     $result = $conn->query($sql);

//     echo "<table>
//             <tr><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>";

//     while ($row = $result->fetch_assoc()) {
//         $qty = $_SESSION['cart'][$row['id']];
//         $subtotal = $qty * $row['price'];
//         $total += $subtotal;

//         echo "<tr>
//                 <td>" . $row['name'] . "</td>
//                 <td>" . $qty . "</td>
//                 <td>₹" . $row['price'] . "</td>
//                 <td>₹" . number_format($subtotal, 2) . "</td>
//               </tr>";
//     }

//     echo "</table><div class='total'>Total: ₹" . number_format($total, 2) . "</div>";
// } else {
//     echo "<p style='text-align:center;'>Your cart is empty!</p>";
// }
if (!empty($_SESSION['cart'])) {
    // Make sure all IDs are integers
    $ids = implode(',', array_map('intval', array_keys($_SESSION['cart'])));

    // Only run the query if IDs are not empty
    if (!empty($ids)) {
        $sql = "SELECT * FROM products WHERE id IN ($ids)";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table>
                    <tr><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>";

            while ($row = $result->fetch_assoc()) {
                $qty = $_SESSION['cart'][$row['id']];
                $subtotal = $qty * $row['price'];
                $total += $subtotal;

                echo "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $qty . "</td>
                        <td>₹" . number_format($row['price'], 2) . "</td>
                        <td>₹" . number_format($subtotal, 2) . "</td>
                      </tr>";
            }

            echo "</table><div class='total'>Total: ₹" . number_format($total, 2) . "</div>";
        } else {
            echo "<p style='text-align:center;'>No products found or query error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='text-align:center;'>Invalid product IDs in cart.</p>";
    }
} else {
    echo "<p style='text-align:center;'>Your cart is empty!</p>";
}

?>
<div style="text-align:center; margin-top: 20px;">
    <a href="checkout.php" style="background:#4caf50;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;">Place Order</a>
</div>


</body>
</html>
