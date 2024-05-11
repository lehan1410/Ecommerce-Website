<?php
    class getProducts extends controller{ 
        static public function getProducts(){
            if(isset($_POST['categories']) && isset($_POST['minPrice']) && isset($_POST['maxPrice'])){
                $categories = $_POST['categories'];
                $minPrice = $_POST['minPrice'];
                $maxPrice = $_POST['maxPrice'];
                $result = getProductsModel::getProducts($categories, $minPrice, $maxPrice);
                return $result;
            }
        }
    }
?>