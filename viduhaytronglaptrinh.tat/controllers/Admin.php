<?php

class Admin extends Controller {
    public $dl = [];
    function index(){
        $this->title = "Trang quản trị";
        
        $this->dl['post'] = $this->model('AdminModel')->getReportInPost();
        
        $this->dl['question'] = $this->model('AdminModel')->getReportInQuestion();
        $this->dl['feedback'] = $this->model('AdminModel')->getFeedback();

        $this->view("admin");
    }
    function deletePost() {
        if(!isset($_SESSION['user']) || $_SESSION['position'] != 2 || !isset($_POST['id'])){
            $this->view("PageError");
            die;
        }
        $id = $_POST['id'];
        if($this->model("AdminModel")->deletePost($id)){
            echo json_encode(array(
                'position' => '1',
                'messenger' => 'Xoá bài viết thành công!'
            ));
        }else{
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Xoá bài viết thất bại!'
            ));
        }
    }
    function deleteQuestion() {
        if(!isset($_SESSION['user']) || $_SESSION['position'] != 2 || !isset($_POST['id'])){
            $this->view("PageError");
            die;
        }
        $id = $_POST['id'];
        if($this->model("AdminModel")->deleteQuestion($id)){
            echo json_encode(array(
                'position' => '1',
                'messenger' => 'Xoá câu hỏi thành công!'
            ));
        }else{
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Xoá câu hỏi thất bại!'
            ));
        }
    }
    function deleteComment() {
        if(!isset($_SESSION['user']) || $_SESSION['position'] != 2 || !isset($_POST['id'])){
            $this->view("PageError");
            die;
        }
        $id = $_POST['id'];
        if($this->model("AdminModel")->deleteComment($id)){
            echo json_encode(array(
                'position' => '1',
                'messenger' => 'Xoá bình luận thành công!'
            ));
        }else{
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Xoá bình luận thất bại!'
            ));
        }
    }
}

?>