<?php
// session_start();

class addtocartModels extends Database {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    public function getRecord($id) {
        $this->connect();
        $sql = "SELECT * FROM products WHERE product_id = $id";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function addToCart($productId, $name) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$productId] = [
                'product_id' => $productId,
                'name' => $name,
                'quantity' => 1
            ];
        }
    }

    public function getCart() {
        return $_SESSION['cart'];
    }
}