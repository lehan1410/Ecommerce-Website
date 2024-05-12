<?php
require_once './mvc/models/cartModel.php';

 class cart extends controller{

    protected $cart;

    public function __construct(){
        $this->cart = new cartModel();
    }
        static public function cart($id){
            $is = new self();
            $view = $is->viewFu($id);
            $data = [];
            while($row = mysqli_fetch_assoc($view)){
                $data[] = $row;
            }
            self::view('pages/cart/cart',$data);
        }

        public function viewFu($id){
            return $this->cart->view($id);
        }

    }
?>