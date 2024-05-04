<?php
class category extends controller{
    static public function add(){
        self::view('pages/category/add',[]);
    }

    static public function category(){
        self::view('pages/category/category',[]);
    }

}