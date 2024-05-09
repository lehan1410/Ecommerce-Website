<?php
require_once "./mvc/models/orderModel.php";
class order extends controller{
    protected $data; 

    function __construct(){
        $this->data = new orderModel();
    }
    static public function order(){
        self::view('pages/order/order',[]);
    }

    static public function detail(){
        self::view('pages/order/detail',[]);
    }

    static public function update($id){
        $instance = new self();
        $instance->update_id($id);
    }

    public function update_id($id) {
        $this->data->update($id);
    }

}