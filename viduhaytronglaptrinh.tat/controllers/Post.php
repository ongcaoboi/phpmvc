<?php

class Post extends Controller {
    function index() {
        $this->tilte = "Bài viết";
        $this->view("Post");
    }
}

?>