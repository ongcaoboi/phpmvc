<?php

class Questions extends Controller {
    public $dl = [];
    function index() {
        $this->title = "Câu hỏi";
       // $this->view("QuestionMe");
        $this->page('news',1);
    }
    function Comment(){
        if(isset($_POST['id']) && isset($_POST['content'])){
            if(isset($_SESSION['user'])){
                if($_POST['content']==""){
                    echo json_encode(array(
                        'position' => '0',
                        'messenger' => 'Đừng để trống bình luận chứ'
                    ));
                }else{
                    if($this->model("QuestionModel")->comment($_POST['id'],$_SESSION['user']['id'], $_POST['content'])){
                        echo json_encode(array(
                            'position' => '1',
                            'messenger' => 'ok'
                        ));
                    }else{
                        echo json_encode(array(
                            'position' => '0',
                            'messenger' => 'Có lỗi rồi đó'
                        ));
                    }
                }
            }else{
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Có lỗi rồi đó'
                ));
            }
        }else{
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Có lỗi rồi đó'
            ));
        }
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
    function details($str = null) {
        if(!is_string($str)){
            $this->view('PageError');
            die;
        }
        $str = explode("-", $str);
        $idQuestion = $str[count($str)-1];
        if(!is_numeric($idQuestion)){
            $this->view('PageError');
            die;
        }
        $model = $this->model("QuestionModel");
        $result = $model->getQuestionDetails($idQuestion);
        if(!is_array($result)){
            $this->view('PageError');
            $model->disConnect();
            die;
        }
        $this->model('QuestionModel')->viewQuestion($idQuestion ,$result['question_views']);
        $this->title = $result['question_title'];
        $this->dl['questionDetails'] = $result;
        $this->dl['infoUserQuestion'] = $this->model('QuestionModel')->getInfoUserQuestion($result['id_user']);

        $this->dl['CommentInQuestion'] = $this->model('QuestionModel')->getCommentInQuestion($idQuestion);
        $keys = $str[rand(0, count($str)-2)];
        $kq = $this->model('QuestionModel')->getQuestionLikeTitle($keys);
        while($kq == null){
            $keys = $str[rand(0, count($str)-2)];
            $kq = $this->model('QuestionModel')->getQuestionLikeTitle($keys);
        }
        $this->dl['questionLikeTitle'] = $kq;
        $t  = -1;
        for ($i=0; $i < count($this->dl['questionLikeTitle']); $i++) { 
            if($this->dl['questionLikeTitle'][$i]['id_question'] == $idQuestion){
                $t = $i;
                break;
            }
        }
        if($t != -1){
            array_splice($this->dl['questionLikeTitle'], $t, 1);
            // unset($this->dl['postLikeTitle'][$t]);
            // array_values($this->dl['postLikeTitle']); 
        }
        // detailArr($this->dl);
        $model->disConnect();
        $this->view("QuestionDetail");
        
    }

    function page($param = null, $page = null){
        if(!is_numeric($page)|| $page <= 0){
            $page = 1;
        }
        $sodong = 13;
        $model = $this->model("QuestionModel");
        $sl = $model->getNumQuestion();
        if($sl['sl']%$sodong == 0){
            $sotrangdl = $sl['sl']/$sodong;
        }else{
            $sotrangdl = floor($sl['sl']/$sodong) + 1;
        }
        $this->dl['listQuestion'] = $this->model("QuestionModel")->getTopQuestion();
        $this->dl['listPost'] = $this->model("QuestionModel")->getTopPost();
        $this->dl['listTopic'] = $this->model("QuestionModel")->getTopTopic();
        if($page > $sotrangdl){
            $this->dl['noiDung'] = null;
            $this->dl['page'] = $page;
            $this->dl['soTrang'] = $sotrangdl;
            $model->disConnect();
            $this->view('Questions');
            die;
        }if($param == 'views'){
            $this->dl['select'] = 'views';
            $kq = $model->getPageOrderView($page, $sodong);
        }else{
            $this->dl['select'] = 'news';
            $kq = $model->getPage($page, $sodong);
        }
        // echo '1';
        // $this->dl['listQuestion'] = $ls;
        // detailArr($this->dl['listQuestion']);
        // die;
        $this->dl['noiDung'] = $kq;
        $this->dl['page'] = $page;
        $this->dl['soTrang'] = $sotrangdl;
        
        //detailArr($this->dl);

        $model->disConnect();
        $this->view('Questions');
        
    }


    function Me($param = null, $page = null){
        if(!isset($_SESSION['user'])){
            $this->view('PageError');
            die;
        }
        if(!is_numeric($page)|| $page <= 0){
            $page = 1;
        }
        $sodong = 13;
        $model = $this->model("QuestionModel");
        $sl = $model->getNumYourQuestion($_SESSION['user']['id']);
        if($sl['sl']%$sodong == 0){
            $sotrangdl = $sl['sl']/$sodong;
        }else{
            $sotrangdl = floor($sl['sl']/$sodong) + 1;
        }
        $this->dl['listQuestion'] = $this->model("QuestionModel")->getTopQuestion();
        $this->dl['listTopic'] = $this->model("QuestionModel")->getTopTopic();
        $this->dl['listPost'] = $this->model("QuestionModel")->getTopPost();
        if($page > $sotrangdl){
            $this->dl['noiDung'] = null;
            $this->dl['page'] = $page;
            $this->dl['soTrang'] = $sotrangdl;
            $model->disConnect();
            $this->view('Questions');
            die;
        }if($param == 'views'){
            $this->dl['select'] = 'views';
            $kq = $model->getYourQuestionView($page, $sodong, $_SESSION['user']['id'] );
        }else{
            $this->dl['select'] = 'news';
            $kq = $model->getYourQuestionPage($page, $sodong, $_SESSION['user']['id']);
        }
        $this->dl['noiDung'] = $kq;
        $this->dl['page'] = $page;
        $this->dl['soTrang'] = $sotrangdl;
        
        // // detailArr($this->dl);

        $model->disConnect();
        $this->view('QuestionMe');
        
    }
    
}

?>