<?php 

class ProfileModel extends DB {
    function checkUser($id){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin user
            $sql = "select count(*) as 'sl' from userr where id_user='{$id}'";
            $result =  $this->fetch_assoc($sql, 1); //
            $this->disConnect();
            return $result;
        }
    }
    function getUser($id){
        $sql  = "select * from userr where id_user='{$id}'";
        $kq = $this->fetch_assoc($sql, 1);
        $this->disConnect();
        return $kq;
    }
    function doiMk($id, $mkm){
        $sql = "update userr set user_password='{$mkm}' where id_user='{$id}'";
        $kq = $this->query($sql);
        $this->disConnect();
        return $kq;
    }

    function doiTenhienthi($id, $newDisplayname ){
        $sql = "update userr set user_display_name='{$newDisplayname}' where id_user='{$id}'";
        $kq = $this->query($sql);
        $this->disConnect();
        return $kq;
    }

    function doiImage($id, $newImage ){
        $sql = "update userr set user_image='{$newImage}' where id_user='{$id}'";
        $kq = $this->query($sql);
        $this->disConnect();
        return $kq;
    }
    
}

?>