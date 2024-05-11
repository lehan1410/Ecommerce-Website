<?php
require_once './mvc/models/orderModel.php';

 class order extends controller{

    protected $order;

    public function __construct(){
        $this->order = new orderModel();
    }

    static public function add($id, $product){
        $is = new self();
        $view = $is->add_order($id, $product);
        // $data = [];
        // while($row = mysqli_fetch_assoc($view)){
        //     $data[] = $row;
        // }
        // self::view('pages/shop/shop', $data);
    }

    public function add_order($id, $product){
        $this->order->add($id, $product);
    }
}
?>