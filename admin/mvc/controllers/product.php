<?php
class product extends controller{
    static public function add(){
        self::view('pages/product/add',[]);
    }

    static public function edit(){
        self::view('pages/product/edit',[]);
    }

    static public function product(){
        self::view('pages/product/product',[]);
    }
}