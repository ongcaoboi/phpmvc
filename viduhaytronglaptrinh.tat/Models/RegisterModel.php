<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class RegisterModel extends DB {
    function checkUser($username){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin user
            $sql = "select count(*) as 'sl' from userr where user_name='{$username}'";
            $result =  $this->fetch_assoc($sql, 1); //
            $this->disConnect();
            return $result;
        }
    }
    function createUser($username, $email, $pass){
        if($this->conn){
            $date = date('Y/m/d H:i:s');
            $sql = "INSERT INTO `userr` (`id_user`, `user_name`, `user_password`, `user_display_name`, `user_email`, `user_position`, `user_status`, `user_date_create`, `user_image`) VALUES (NULL, '{$username}', '{$pass}', NULL, '{$email}', '0', '1', '{$date}', NULL)";
            $result = $this->query($sql);
            $this->disConnect();
            return $result;
        }
    }
    function createTKCho($name, $ma, $email, $pass){
        if($this->conn){
            $sql = "INSERT INTO `tkhoan_cho`(`name`,`ma`,`email`,`pass`) VALUES ('{$name}','{$ma}','{$email}','{$pass}')";
            $result = $this->query($sql);
            $this->disConnect();
            return $result;
        }
    }
    function deleteTKCho($name){
        if($this->conn){
            $sql = "delete from tkhoan_cho where name='{$name}'";
            $result = $this->query($sql);
            $this->disConnect();
            return $result;
        }
    }
    function checkTKCho($name){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin user
            $sql = "select count(*) as 'sl' from tkhoan_cho where name='{$name}'";
            $result =  $this->fetch_assoc($sql, 1); //
            $this->disConnect();
            return $result;
        }
    }
    function checkTKChoVoiMa($name, $ma){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin user
            $sql = "select * from tkhoan_cho where name='{$name}' and ma='{$ma}'";
            $result =  $this->fetch_assoc($sql, 1); //
            $this->disConnect();
            return $result;
        }
    }
    
}

?>