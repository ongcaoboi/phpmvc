<?php

class Home extends Controller {
    function index() {
        $this->title = "Trang chủ";
        $this->view("Home");
    }
}

?>