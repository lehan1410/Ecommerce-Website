<?php

    class productModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view(){
            $this->data->connect();
            $sql = "SELECT * FROM products join categories on products.category_id = categories.category_id
            left join coupouns on products.product_id = coupouns.product_id";
            return mysqli_query($this->data->conn, $sql);
        }

        public function update($id){
            $this->data->connect();
            $sql = "UPDATE products SET flash = 0 WHERE product_id = $id";
            return mysqli_query($this->data->conn, $sql);
        }

    }
