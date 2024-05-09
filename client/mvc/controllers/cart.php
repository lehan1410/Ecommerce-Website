<?php
    class cart extends controller{
        static public function cart(){
            self::view('pages/cart/cart',[]);
        }

        static public function add(){
            $product_id = $_GET['product_id'];
            $product = addtocartModels::getRecord($product_id);
            addtocartModels::addToCart($product_id, $product['name']);
            self::view('pages/cart/cart',[]);
        }
    }
?>