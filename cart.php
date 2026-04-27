<?php
include 'db.php';
include 'functions.php';

if (isset($_GET['checkout'])) {
    clearCart();
}

$total = 0;
?>

<h1>Your Cart</h1>
<a href="index.php">Continue Shopping</a>

<?php
if (!empty($_SESSION['cart'])):
foreach ($_SESSION['cart'] as $id => $qty):

$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();

$itemTotal = $product['price'] * $qty;
$total += $itemTotal;
?>

<div>
    <h3><?php echo $product['name']; ?></h3>
    <p>Qty: <?php echo $qty; ?></p>
    <p>Price: $<?php echo $product['price']; ?></p>
    <p>Total: $<?php echo $itemTotal; ?></p>
</div>

<?php endforeach; endif; ?>

<?php
$tax = $total * 0.05;
$shipping = $total * 0.10;
$grandTotal = $total + $tax + $shipping;
?>

<h3>Items Total: $<?php echo $total; ?></h3>
<h3>Tax (5%): $<?php echo $tax; ?></h3>
<h3>Shipping (10%): $<?php echo $shipping; ?></h3>
<h2>Order Total: $<?php echo $grandTotal; ?></h2>

<a href="?checkout=true">Checkout</a>