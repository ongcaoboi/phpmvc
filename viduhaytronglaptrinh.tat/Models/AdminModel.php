<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class AdminModel extends DB {

    function deletePost($id){
        if($this->conn){
            $sql = "DELETE from post where id_post='{$id}'";
            $kq = $this->query($sql);
            $this->disConnect();
            return $kq;
        }
    }
    function deleteQuestion($id){
        if($this->conn){
            $sql = "DELETE from question where id_question='{$id}'";
            $kq = $this->query($sql);
            $this->disConnect();
            return $kq;
        }
    }
    function deleteComment($id){
        if($this->conn){
            $sql = "DELETE from comments where id_comment='{$id}'";
            $kq = $this->query($sql);
            $this->disConnect();
            return $kq;
        }
    }
    function getReportInPost(){
        if($this->conn){
            $sql = "SELECT id_report, C.id_user, C.user_name as user_report, C.id_post, post_title, report_content, id_user_post, user_name_post, C.id_topic, topic_name from (SELECT id_report, B.id_user, B.id_post, post_title, report_content, B.user_name, id_user_post, userr.user_name as user_name_post, id_topic FROM(SELECT id_report, A.id_user, A.id_post, post_title, report_content, user_name, post.id_user as id_user_post, id_topic from (SELECT id_report, report.id_user, id_post, report_content, user_name FROM report LEFT JOIN userr on report.id_user = userr.id_user WHERE id_post is not null) as A LEFT JOIN post on A.id_post = post.id_post) as B LEFT JOIN userr on B.id_user_post = userr.id_user) as C LEFT JOIN topic on C.id_topic = topic.id_topic";
            $kq = $this->fetch_assoc($sql, 0);
            $this->disConnect();
            return $kq;
        }
    }
    function getReportInPostWhereTopic($id){
        if($this->conn){
            $sql = "SELECT id_report, C.id_user, C.user_name as user_report, C.id_post, post_title, report_content, id_user_post, user_name_post, C.id_topic, topic_name from (SELECT id_report, B.id_user, B.id_post, post_title, report_content, B.user_name, id_user_post, userr.user_name as user_name_post, id_topic FROM(SELECT id_report, A.id_user, A.id_post, post_title, report_content, user_name, post.id_user as id_user_post, id_topic from (SELECT id_report, report.id_user, id_post, report_content, user_name FROM report LEFT JOIN userr on report.id_user = userr.id_user WHERE id_post is not null) as A LEFT JOIN post on A.id_post = post.id_post) as B LEFT JOIN userr on B.id_user_post = userr.id_user) as C LEFT JOIN topic on C.id_topic = topic.id_topic WHERE C.id_topic = '{$id}";
            $kq = $this->fetch_assoc($sql, 0);
            $this->disConnect();
            return $kq;
        }
    }
    function getReportInQuestion(){
        if($this->conn){
            $sql = "SELECT id_report, B.id_user, B.user_name as user_report, B.id_question, question_title, report_content, id_user_question, userr.user_name as user_name_question FROM(SELECT id_report, A.id_user, A.id_question, question_title, report_content, user_name, question.id_user as id_user_question from (SELECT id_report, report.id_user, id_question, report_content, user_name FROM report LEFT JOIN userr on report.id_user = userr.id_user WHERE id_question is not null) as A LEFT JOIN question on A.id_question = question.id_question) as B LEFT JOIN userr on B.id_user_question = userr.id_user";
            $kq = $this->fetch_assoc($sql, 0);
            $this->disConnect();
            return $kq;
        }
    }
    function getFeedback(){
        if($this->conn){
            $sql = "SELECT * from feedback";
            $kq = $this->fetch_assoc($sql, 0);
            $this->disConnect();
            return $kq;
        }
    }
}

?>