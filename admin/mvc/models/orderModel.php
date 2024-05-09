<?php
    class orderModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function update($id) {
            $this->data->connect();
            $sql = "UPDATE order_details SET status = 'Da giao' WHERE order_detail_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }
    }
