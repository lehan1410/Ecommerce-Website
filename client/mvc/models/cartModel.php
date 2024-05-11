<?php
    class cartModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view($id){
            $query = "SELECT * FROM cart";
            $result = $this->data->fetch_all($query);
            return $result;
        }
    
    }
?>