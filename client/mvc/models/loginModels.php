<?php
    class loginModels extends database {
        public function login($email, $password){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM users where email = '$email' and password = '$password'";
            return mysqli_query($a->conn, $sql);
        }
    }
?>