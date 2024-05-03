<?php
class home extends controller{
    static public function login(){
        self::view('login',[]);
    }

    static public function index(){
        self::view('index',[]);
    }

    static public function add(){
        self::view('pages/user/add',[]);
    }

    static public function user(){
        self::view('pages/user/user',[]);
    }

    static public function edit(){
        self::view('pages/user/edit',[]);
    }
}