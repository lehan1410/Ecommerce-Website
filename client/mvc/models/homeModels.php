<?php
    class homeModels extends database {
        public function view(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM products";
            return mysqli_query($a->conn, $sql);
        }
    }
?>