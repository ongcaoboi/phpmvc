<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class FeedbackModel extends DB {
    function createFb($name, $email, $sdt, $title, $content){
        if($this->conn){
            $date = date('Y/m/d H:i:s');
            $sql = "INSERT into feedback (id, `name`, email, sdt, title, content, `status`, `date`) values (null, '{$name}', '{$email}', '{$sdt}', '{$title}', '{$content}', '0', '{$date}' )";
            $kq = $this->query($sql);
            $this->disConnect();
            return $kq;
        }
    }

}

?>