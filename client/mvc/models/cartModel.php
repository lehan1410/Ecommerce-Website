<?php
    class cartModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view($id){
            $this->data->connect();
            $sql = "SELECT * FROM orders";
            return mysqli_query($this->data->conn, $sql);
        }
    
    }
?>