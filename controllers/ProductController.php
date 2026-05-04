<?php
include_once "models/Product.php";

class ProductController {
    private $productModel;

    public function __construct($db) {
        $this->productModel = new Product($db);
    }

    public function catalog() {
        return $this->productModel->getAllProducts();
    }
}
?>