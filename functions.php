<?php

function addToCart($id) {
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } else {
        $_SESSION['cart'][$id]++;
    }
}

function removeFromCart($id) {
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]--;
        if ($_SESSION['cart'][$id] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
}

function clearCart() {
    unset($_SESSION['cart']);
}
?>