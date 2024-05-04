<?php
class user extends controller{
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