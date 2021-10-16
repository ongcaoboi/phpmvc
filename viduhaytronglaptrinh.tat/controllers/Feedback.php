<?php

class Feedback extends Controller {
    function index() {
        $this->title = "Phản hồi";
        $this->view("Feedback");
    }
}

?>