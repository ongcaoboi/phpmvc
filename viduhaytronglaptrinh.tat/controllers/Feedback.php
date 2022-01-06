<?php

class Feedback extends Controller {
    function index() {
        $this->title = "Phản hồi";
        $this->view("Feedback");
    }
    function send(){
        if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['sdt']) || !isset($_POST['title']) || !isset($_POST['content'])){
            $this->view("PageError");
            die;
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        if($name == "" || $name == null){
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đừng để trống tên chứ!'
            )); 
            die;
        }
        if($email == "" || $email == null){
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đừng để trống email chứ!'
            )); 
            die;
        }
        if($sdt == "" || $sdt == null){
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đừng để trống số điện thoại chứ!'
            )); 
            die;
        }
        if($title == "" || $title == null){
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đừng để trống tiêu đề chứ!'
            )); 
            die;
        }
        if($content == "" || $content == null){
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đừng để trống nội dung chứ!'
            )); 
            die;
        }
        if($this->model("FeedbackModel")->createFb($name, $email, $sdt, $title, $content)){
            echo json_encode(array(
                'position' => '1',
                'messenger' => 'Phản hồi thành công!'
            )); 
        }else{
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đã có lỗi xảy ra!'
            ));
        }
    }
}

?>