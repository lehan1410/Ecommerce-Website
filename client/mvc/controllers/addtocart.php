<?php
    require_once '../models/addtocartModels.php';

    if(isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $addtocart = new AddToCart();
        $addtocart->addToCart($product_id);
    }
    

?>