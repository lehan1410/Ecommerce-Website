<?php
    class getProducts extends controller{ 
        static public function getProducts(){
            $query = $db->prepare('SELECT * FROM products WHERE price BETWEEN :min_price AND :max_price AND category = :category');
            $query->execute(['min_price' => $minPrice, 'max_price' => $maxPrice, 'category' => $category]);
        
            // Fetch the products
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
        
            // Return the products
            return $products;
        }
    }
?>