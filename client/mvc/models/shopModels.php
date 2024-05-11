<?php
    class shopModels extends database {
        public function view(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM products";
            return mysqli_query($a->conn, $sql);
        }
        public function getPagination($current_page) {
            $a = new Database();
            $a->connect();

            $products_per_page = 6;
            $offset = ($current_page - 1) * $products_per_page;

            // Your SQL query to get the total number of products
            $sql = "SELECT COUNT(*) as total_products FROM products";
            $result = $a->conn->query($sql);
            $total_products = $result->fetch_assoc()['total_products'];

            $total_pages = ceil($total_products / $products_per_page);

            // Your SQL query to get the products for the current page
            $sql = "SELECT * FROM products LIMIT $offset, $products_per_page";
            $result = $a->conn->query($sql);

            // Fetch the products
            $products = $result->fetch_all(MYSQLI_ASSOC);

            return [$products, $total_pages];
        }
}

?>