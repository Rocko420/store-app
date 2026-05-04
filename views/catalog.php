<!DOCTYPE html>
<html>
<head>
    <title>Store Catalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Store Catalog</h1>
<a href="cart.php">View Cart</a>
<hr>

<?php while($row = $result->fetch_assoc()): ?>
<div style="margin-bottom: 20px;">
    <h3><?= htmlspecialchars($row['name']) ?></h3>
    <p><?= htmlspecialchars($row['description']) ?></p>
    <p><strong>$<?= number_format($row['price'], 2) ?></strong></p>

    <a href="index.php?add=<?= $row['id'] ?>"><button>Add</button></a>
    <a href="index.php?remove=<?= $row['id'] ?>"><button>Remove</button></a>

    <p>In Cart: <?= $_SESSION['cart'][$row['id']] ?? 0 ?></p>
</div>
<hr>
<?php endwhile; ?>

</body>
</html>