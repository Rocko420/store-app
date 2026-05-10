<?php

class Product {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products ORDER BY id ASC";
        return $this->conn->query($sql);
    }

    public function getProductById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");

        if (!$stmt) {
            die("Query failed.");
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}

?>