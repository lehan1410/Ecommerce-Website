<?php
    class userModel extends database {
        public function view(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM users";
            return mysqli_query($a->conn, $sql);
        }

        public function remove($userId){
            $a = new Database();
            $a->connect();
            $sql = "DELETE FROM users WHERE user_id = $userId";
            return mysqli_query($a->conn, $sql);
        }

        public function edit($userId){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM users WHERE user_id = $userId";
            return mysqli_query($a->conn, $sql);
        }

    }