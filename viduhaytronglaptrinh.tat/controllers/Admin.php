<?php

class Admin extends Controller {
    function index() {
        $this->title = "Trang quản trị";
        $this->view("admin");
    }
}

?>