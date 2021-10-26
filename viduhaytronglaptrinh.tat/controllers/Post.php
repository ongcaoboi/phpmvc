<?php

class Post extends Controller {
    function index() {
        $this->title = "Bài viết";
        $this->view("Post");
    }
    function log(){
        echo "<pre>";
        echo print_r($GLOBALS);
        echo "</pre>";

    }
}

?>