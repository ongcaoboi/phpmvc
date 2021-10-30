<?php

class Post extends Controller {
    function index() {
        $this->title = "Bài viết";
        $this->view("Post");
    }
}

?>