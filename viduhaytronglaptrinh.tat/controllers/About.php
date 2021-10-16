<?php

class About extends Controller {
    function index() {
        $this->title = "Thông tin";
        $this->view("About");
    }
}

?>