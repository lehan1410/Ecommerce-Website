<?php
class controller{
    static function view($view, $data=[]){
        require_once "../admin/mvc/views/".$view.".php";
    }
}
?>