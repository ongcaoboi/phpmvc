<?php 

class LoginModel extends DB {
    function login($username){
        if($this->conn){
            $sql = "select *from userr where user_name='{$username}'";
            return $this->fetch_assoc($sql, 1);
        }
    }
}

?>