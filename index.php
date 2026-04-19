<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include 'db.php';
include 'functions.php';

if (isset($_GET['add'])) {
    addToCart($_GET['add']);
}

if (isset($_GET['remove'])) {
    removeFromCart($_GET['remove']);
}

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Store Catalog</h1>

<a href="cart.php">Go to Cart</a>

<?php while($row = $result->fetch_assoc()): ?>
<div>
    <h3><?php echo $row['name']; ?></h3>
    <p><?php echo $row['description']; ?></p>
    <p>$<?php echo $row['price']; ?></p>

    <a href="?add=<?php echo $row['id']; ?>">Add</a>
    <a href="?remove=<?php echo $row['id']; ?>">Remove</a>

    <p>Qty: <?php echo $_SESSION['cart'][$row['id']] ?? 0; ?></p>
</div>
<hr>
<?php endwhile; ?>

</body>
</html>