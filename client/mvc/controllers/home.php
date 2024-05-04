<?php
class home extends controller{
    static public function index(){
        self::view('index',[]);
    }
    static public function login(){
        self::view('login',[]);
    }
    
    // static public function blog(){
    //     self::view('blog',[]);
    // }
    // static public function about(){
    //     self::view('about',[]);
    // }
    // static public function contact(){
    //     self::view('contact',[]);
    // }
    
    // static public function cart(){
    //     self::view('cart',[]);
    // }
    // static public function checkout(){
    //     self::view('checkout',[]);
    // }
    // static public function product(){
    //     self::view('product',[]);
    // }
}
?>