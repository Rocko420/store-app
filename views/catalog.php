<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <header>
        <h1>Online Store</h1>

        <nav>
            <a class="nav-button" href="cart.php">
                View Cart
            </a>
        </nav>
    </header>

    <section class="products">

        <?php while($row = $result->fetch_assoc()): ?>

            <div class="product-card">

                <h2>
                    <?= htmlspecialchars($row['name']) ?>
                </h2>

                <p class="description">
                    <?= htmlspecialchars($row['description']) ?>
                </p>

                <p class="price">
                    $<?= number_format($row['price'], 2) ?>
                </p>

                <div class="button-group">

                    <a href="index.php?add=<?= $row['id'] ?>">
                        <button class="add-btn">
                            Add to Cart
                        </button>
                    </a>

                    <a href="index.php?remove=<?= $row['id'] ?>">
                        <button class="remove-btn">
                            Remove
                        </button>
                    </a>

                </div>

                <p class="cart-count">
                    In Cart:
                    <?= $_SESSION['cart'][$row['id']] ?? 0 ?>
                </p>

            </div>

        <?php endwhile; ?>

    </section>

</div>

</body>
</html>