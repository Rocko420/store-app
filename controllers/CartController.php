<?php
include_once "models/Cart.php";

class CartController {
    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    public function add($id) {
        $this->cart->add($id);
    }

    public function remove($id) {
        $this->cart->remove($id);
    }
}
?>