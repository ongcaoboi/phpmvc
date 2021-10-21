<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class LoginModel extends DB {
    function login($username){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin user
            $sql = "select *from userr where user_name='{$username}'";
            return $this->fetch_assoc($sql, 1); //
        }
    }
}

?>