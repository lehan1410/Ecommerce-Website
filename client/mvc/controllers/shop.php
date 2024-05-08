<?php
require_once './mvc/models/shopModels.php';

 class shop extends controller{

    protected $shop;
    public function __construct(){
        $this->shop = new shopModels();
    }

    static public function shop(){
        $is = new self();
        $view = $is->viewProducts();
        $data = [];
        while($row = mysqli_fetch_assoc($view)){
            $data[] = $row;
        }
        self::view('pages/shop/shop', $data);
    }

    public function viewProducts(){
        return $this->shop->view();
    }
}
?>