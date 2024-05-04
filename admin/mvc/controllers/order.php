<?php
class order extends controller{
    static public function order(){
        self::view('pages/order/order',[]);
    }

    static public function detail(){
        self::view('pages/order/detail',[]);
    }

}