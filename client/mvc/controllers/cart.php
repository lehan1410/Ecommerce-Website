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
            self::view('pages/cart/cart',[]);
        }

        public function viewFu($id){
            return $this->cart->view($id);
        }

    }
?>