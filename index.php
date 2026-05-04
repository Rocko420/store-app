<?php
session_start();

include "config/db.php";
include "controllers/ProductController.php";
include "controllers/CartController.php";

$productController = new ProductController($conn);
$cartController = new CartController();

if (isset($_GET['add'])) {
    $cartController->add($_GET['add']);
}

if (isset($_GET['remove'])) {
    $cartController->remove($_GET['remove']);
}

$result = $productController->catalog();

include "views/catalog.php";
?>