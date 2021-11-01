<?php

class Questions extends Controller {
    function index() {
        $this->title = "Câu hỏi";
        $this->view("Questions");
    }
    function getAllQuestions(){
        $model = $this->model('QuestionModel');
        $result = $model->getAllQuestions();
        $model->disConnect();
        echo json_encode($result);
        detailArr($result);
    }
    function getQuestion($id){
        $model = $this->model('QuestionModel');
        $result = $model->getQuestion($id);
        echo json_encode($result);
    }
}

?>