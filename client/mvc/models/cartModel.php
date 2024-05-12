<?php
    class cartModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view($id){
            $this->data->connect();
            $sql = "SELECT * FROM orders where user_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }
    
    }
?>