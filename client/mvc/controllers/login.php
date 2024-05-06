<?php
class login extends controller{
    static public function login(...$params){
        self::view('login', $params);
    }

    static public function loginAction(){
        require_once "./mvc/models/loginModels.php";
        $email = $_POST['email'];
        $password = $_POST['pass'];
        echo $email;
        echo $password;
        $a = new loginModels();
        $result = mysqli_num_rows($a->login($email, $password));
        echo $result;
        if ($result == 1) {
            header('Location: http://localhost:8080/Ecommerce-Website/client/home/index');
        }else {
            header('Location: http://localhost:8080/Ecommerce-Website/client/login/login/fail');
        }
    }
}