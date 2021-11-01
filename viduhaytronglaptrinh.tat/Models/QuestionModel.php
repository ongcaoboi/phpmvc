<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class QuestionModel extends DB {
    function getAllQuestions(){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về danh sách câu hỏi
            // $sql = "SELECT  `id_question` as `id`,`question_title` as `title`, `question_date_created` as `date`, `question_views` as `views`, `user_name` as `nameTK`, `user_display_name` as `displayName`, COUNT(`id`) as `slTraLoi`  from (SELECT  A.`id_question`, `question_title`, `question_date_created`, `question_views`, `user_name`, `user_display_name`, comments.`id_question` as `id`  from (SELECT question.`id_question`, `question_title`, `question_date_created`, `question_views`, userr.`user_name`, `user_display_name` FROM question, userr WHERE question.`id_user` = userr.`id_user`) as A
            // LEFT JOIN comments on A.`id_question` = comments.`id_question`) as B GROUP BY `id_question`,`question_title`, `question_date_created`, `question_views`, `user_name`, `user_display_name`";
            $sql = "CALL getListQuestion()";
            return $this->fetch_assoc($sql, 0);
        }
    }
    function getQuestion($id){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin 1 câu hỏi
            $sql = "select *from question where id ='{$id}'";
            return $this->fetch_assoc($sql, 1);
        }
    }
}

?>