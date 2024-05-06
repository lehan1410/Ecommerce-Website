<?php
    class dasboardModels extends database {
        public function product(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT sum(quantity) from `products`";
            return mysqli_query($a->conn, $sql);
        }
    }