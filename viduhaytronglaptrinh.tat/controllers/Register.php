<?php 

class Register extends Controller {
    function index(){
        $this->title = "Đăng ký tài khoản";
        $this->view("Register");
    }
}

?>