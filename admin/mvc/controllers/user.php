<?php
require_once "./mvc/models/userModel.php";
class user extends controller{

    protected $data;

    function __construct(){
        $this->data = new userModel();
    }

    static public function add(){
        self::view('pages/user/add',[]);
    }

    static public function user(){
        $instance = new self();
        $view = $instance->viewUser();
        $data = [];
        while ($row = mysqli_fetch_assoc($view)) {
            $data[] = $row;
        }
        self::view('pages/user/user',$data);
    }

    static public function remove($userId){
        $instance = new self();
        $view = $instance->removeUser($userId);
    }


    static public function edit($userId){
        $instance = new self();
        $view = $instance->editUser($userId);
        self::view('pages/user/edit',mysqli_fetch_assoc($view));
    }

    function viewUser(){
        $result = $this->data->view();
        return $result;
    }

    function removeUser($userId){
        $result = $this->data->remove($userId);
        return $result;
    }

    function editUser($userId){
        $result = $this->data->edit($userId);
        return $result;
    }
}