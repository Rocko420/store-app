<?php

include 'config/db.php';

if (isset($_GET['checkout'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

$total = 0;

include 'views/cartView.php';

?>