<?php
class product extends controller{
    static public function add(){
        self::view('pages/product/add',[]);
    }

    static public function user(){
        self::view('pages/product/user',[]);
    }

    static public function product(){
        self::view('pages/product/product',[]);
    }
}