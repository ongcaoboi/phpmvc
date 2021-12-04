<?php

class Home extends Controller {
    public $dl = [];
    function index() {
        $this->title = "Trang chủ";
        $this->dl['listQuestion'] = $this->model("PostModel")->getTopQuestion();
        $this->dl['listPost'] = $this->model("PostModel")->getTopPost();
        $this->dl['listTopic'] = $this->model("PostModel")->getTopTopic();
        $this->view("Home");
    }
}

?>