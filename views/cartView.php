<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <header>
        <h1>Your Shopping Cart</h1>

        <nav>
            <a class="nav-button" href="index.php">
                Continue Shopping
            </a>
        </nav>
    </header>

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

            <div class="cart-item">

                <h2>
                    <?= htmlspecialchars($product['name']); ?>
                </h2>

                <p>
                    Quantity:
                    <?= $qty; ?>
                </p>

                <p>
                    Price:
                    $<?= number_format($product['price'], 2); ?>
                </p>

                <p>
                    Item Total:
                    $<?= number_format($itemTotal, 2); ?>
                </p>

            </div>

        <?php endforeach; ?>

        <?php

        $tax = $total * 0.05;
        $shipping = $total * 0.10;
        $grandTotal = $total + $tax + $shipping;

        ?>

        <div class="summary">

            <h3>
                Items Total:
                $<?= number_format($total, 2); ?>
            </h3>

            <h3>
                Tax (5%):
                $<?= number_format($tax, 2); ?>
            </h3>

            <h3>
                Shipping (10%):
                $<?= number_format($shipping, 2); ?>
            </h3>

            <h2>
                Order Total:
                $<?= number_format($grandTotal, 2); ?>
            </h2>

            <a href="cart.php?checkout=true">
                <button class="checkout-btn">
                    Checkout
                </button>
            </a>

        </div>

    <?php else: ?>

        <div class="empty-cart">
            <h2>Your cart is empty.</h2>
        </div>

    <?php endif; ?>

</div>

</body>
</html>