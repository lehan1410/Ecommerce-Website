<?php
require_once "./mvc/models/dashboardModel.php";
class dashboard extends controller{
    
    protected $data;

    function __construct(){
        $this->data = new dasboardModels();
    }

    static public function index(){
        $instance = new self();
        $product = $instance->product();
        $data = [
            "product" => $product
        ];
        self::view('index',$data);
    }

    public function product(){
        $result = $this->data->product();
        $row = mysqli_fetch_array($result);
        return $row[0];
    }
}