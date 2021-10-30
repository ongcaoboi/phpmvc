<?php

class Questions extends Controller {
    function index() {
        $this->title = "Câu hỏi";
        $this->view("Questions");
    }
    function getAllQuestion(){
        $model = $this->model('QuestionModel');
        $result = $model->getAllQuestion();
        $model->disConnect();
        echo detailArr($result);
    }
}

?>