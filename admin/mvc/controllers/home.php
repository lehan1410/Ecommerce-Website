<?php
class home extends controller{
    static public function login(){
        self::view('login',[]);
    }

    static public function index(){
        self::view('index',[]);
    }
}