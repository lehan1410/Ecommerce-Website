<?php
require_once "./mvc/models/orderModel.php";
class order extends controller{
    protected $data; 

    function __construct(){
        $this->data = new orderModel();
    }
    static public function order(){
        $instance = new self();
        $view = $instance->viewFul();
        $data = [];
        while ($row = mysqli_fetch_assoc($view)) {
            $data[] = $row;
        }
        self::view('pages/order/order',$data);
    }

    static public function detail($id){
        $instance = new self();
        $view = $instance->viewDe($id);
        $data = mysqli_fetch_array($view);
        self::view('pages/order/detail', $data);
    }

    public function viewFul(){
        return $this->data->view();
    }

    public function viewDe($id){
        return $this->data->viewDe($id);
    }

    static public function update($id){
        $instance = new self();
        $instance->update_id($id);
    }

    public function update_id($id) {
        $this->data->update($id);
    }

}