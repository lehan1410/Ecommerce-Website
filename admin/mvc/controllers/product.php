<?php
require_once "./mvc/models/productModels.php";
class product extends controller{

    protected $data; 

    function __construct(){
        $this->data = new productModel();
    }

    static public function add(){
        self::view('pages/product/add',[]);
    }

    static public function edit(){
        self::view('pages/product/edit',[]);
    }

    static public function update_flash($id){
        $instance = new self();
        $instance->update($id);
    }

    static public function product(){
        $instance = new self();
        $view = $instance->viewProduct();
        $data = [];
        while ($row = mysqli_fetch_assoc($view)) {
            $data[] = $row;
        }
        self::view('pages/product/product',$data);
    }

    public function viewProduct(){
        return $this->data->view();
    }

    public function update($id){
        $this->data->update($id);
    }
}