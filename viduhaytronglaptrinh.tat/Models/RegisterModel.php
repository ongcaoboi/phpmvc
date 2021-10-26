<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class RegisterModel extends DB {
    function checkUser($username){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin user
            $sql = "select count(*) as 'sl' from userr where user_name='{$username}'";
            return $this->fetch_assoc($sql, 1); //
        }
    }
}

?>