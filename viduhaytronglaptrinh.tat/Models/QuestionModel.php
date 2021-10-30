<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class QuestionModel extends DB {
    function getAllQuestion(){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin user
            $sql = "select *from question";
            return $this->fetch_assoc($sql, 0);
        }
    }
}

?>