<?php

class Cart {

    public function add($id) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }

    public function remove($id) {
        if (!isset($_SESSION['cart'][$id])) return;

        $_SESSION['cart'][$id]--;

        if ($_SESSION['cart'][$id] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }

    public function getCart() {
        return $_SESSION['cart'] ?? [];
    }
}
?>