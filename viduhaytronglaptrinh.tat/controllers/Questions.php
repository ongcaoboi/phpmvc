<?php

class Questions extends Controller {
    function index() {
        $this->title = "Câu hỏi";
        $this->view("Questions");
    }
}

?>