<?php
session_start();

include 'config/db.php';

if (isset($_GET['checkout'])) {
    unset($_SESSION['cart']);
}

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Your Cart</h1>
<a href="index.php">Continue Shopping</a>
<hr>

<?php if (!empty($_SESSION['cart'])): ?>

    <?php foreach ($_SESSION['cart'] as $id => $qty): ?>

        <?php
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        $itemTotal = $product['price'] * $qty;
        $total += $itemTotal;
        ?>

        <div style="margin-bottom: 15px;">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <p>Qty: <?php echo $qty; ?></p>
            <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
            <p>Total: $<?php echo number_format($itemTotal, 2); ?></p>
        </div>
        <hr>

    <?php endforeach; ?>

<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>

<?php
$tax = $total * 0.05;
$shipping = $total * 0.10;
$grandTotal = $total + $tax + $shipping;
?>

<h3>Items Total: $<?php echo number_format($total, 2); ?></h3>
<h3>Tax (5%): $<?php echo number_format($tax, 2); ?></h3>
<h3>Shipping (10%): $<?php echo number_format($shipping, 2); ?></h3>
<h2>Order Total: $<?php echo number_format($grandTotal, 2); ?></h2>

<br>

<a href="cart.php?checkout=true"><button>Checkout</button></a>

</body>
</html>