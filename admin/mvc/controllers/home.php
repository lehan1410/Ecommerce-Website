<?php
class home extends controller{
    static public function login(){
        self::view('login',[]);
    }

    static public function index(){
        self::view('index',[]);
    }

    // static public function category(){
    //     self::view('pages/category/category',[]);
    // }

    // static public function category(){
    //     self::view('pages/category/category',[]);
    // }
}