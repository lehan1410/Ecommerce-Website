<?php
class login extends controller{
    static public function login(...$params){
        self::view('login', $params);
    }

    
    static public function loginAction(){
        require "./mvc/models/loginModels.php";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $a = new loginModels();
        $result = mysqli_num_rows($a->login($email, $password));
        if ($result == 1) {
            header('Location: http://localhost:8080/Ecommerce-Website/client/home/index');
        } else {
            header('Location: http://localhost:8080/Ecommerce-Website/client/login/login/failed');
        }
    }
    
}