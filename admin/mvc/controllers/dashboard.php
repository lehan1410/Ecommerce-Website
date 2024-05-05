<?php
class dashboard extends controller{

    static public function index(){
        $product = self::product();
        $data = [
            "product" => $product
        ];
        self::view('index',$data);
    }

    static public function product(){
        require_once "./mvc/models/dashboardModel.php";
        $a = new dasboardModels();
        $result = $a->product();
        $row = mysqli_fetch_array($result);
        return $row[0];
    }
}