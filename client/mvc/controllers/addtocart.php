<?php
require_once '../models/cartModels.php';

$productId = isset($_GET['product_id']) ? $_GET['product_id'] : null;

if ($productId !== null) {
    $cartModel = new cartModels();
    $product = $cartModel->getRecord($productId);

    if ($product !== null) {
        $cartModel->addToCart($productId, $product['name']);
    }
}