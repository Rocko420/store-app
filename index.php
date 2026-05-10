<?php

include "config/db.php";
include "controllers/ProductController.php";
include "controllers/CartController.php";

$productController = new ProductController($conn);
$cartController = new CartController();

if (isset($_GET['add'])) {
    $cartController->add((int)$_GET['add']);
    header("Location: index.php");
    exit();
}

if (isset($_GET['remove'])) {
    $cartController->remove((int)$_GET['remove']);
    header("Location: index.php");
    exit();
}

$result = $productController->catalog();

include "views/catalog.php";

?>