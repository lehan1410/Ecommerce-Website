<?php
class coupon extends controller{
    static public function add(){
        self::view('pages/coupon/add',[]);
    }

    static public function coupon(){
        self::view('pages/coupon/coupon',[]);
    }
}