<?php

class Post extends Controller {
    public $dl = [];
    function index() {
        $this->title = "Bài viết";
        // $this->view("Post");
        $this->page('news',1);
        
    }
    function getPost() {
        $this->title = "Bài viết";
        $this->view("PostDetail");
    }
    function page($param = null, $page = null){
        if(!is_numeric($page)|| $page <= 0){
            $page = 1;
        }
        $sodong = 3;
        $model = $this->model("PostModel");
        $sl = $model->getNumPost();
        if($sl['sl']%$sodong == 0){
            $sotrangdl = $sl['sl']/$sodong;
        }else{
            $sotrangdl = floor($sl['sl']/$sodong) + 1;
        }
        $this->dl['listQuestion'] = $this->model("PostModel")->getTopQuestion();
        $this->dl['listPost'] = $this->model("PostModel")->getTopPost();
        if($page > $sotrangdl){
            $this->dl['noiDung'] = null;
            $this->dl['page'] = $page;
            $this->dl['soTrang'] = $sotrangdl;
            $model->disConnect();
            $this->view('Post');
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
        
        $model->disConnect();
        $this->view('Post');
        
    }
    
    function Me($param = null, $page = null){
        if(!isset($_SESSION['user'])){
            $this->view('PageError');
            die;
        }
        if(!is_numeric($page)|| $page <= 0){
            $page = 1;
        }
        $sodong = 3;
        $model = $this->model("PostModel");
        $sl = $model->getNumYourPost($_SESSION['user']['id']);
        if($sl['sl']%$sodong == 0){
            $sotrangdl = $sl['sl']/$sodong;
        }else{
            $sotrangdl = floor($sl['sl']/$sodong) + 1;
        }
        $this->dl['listQuestion'] = $this->model("PostModel")->getTopQuestion();
        $this->dl['listPost'] = $this->model("PostModel")->getTopPost();
        if($page > $sotrangdl){
            $this->dl['noiDung'] = null;
            $this->dl['page'] = $page;
            $this->dl['soTrang'] = $sotrangdl;
            $model->disConnect();
            $this->view('Post');
            die;
        }if($param == 'views'){
            $this->dl['select'] = 'views';
            $kq = $model->getYourPostView($page, $sodong, $_SESSION['user']['id'] );
        }else{
            $this->dl['select'] = 'news';
            $kq = $model->getYourPostPage($page, $sodong, $_SESSION['user']['id']);
        }
        $this->dl['noiDung'] = $kq;
        $this->dl['page'] = $page;
        $this->dl['soTrang'] = $sotrangdl;
        
        // detailArr($this->dl);

        $model->disConnect();
        $this->view('PostMe');
        
    }
    function getPost1(){
        $this->title = "Danh sách bài viết";
        // $this->duLieu = "12334445";
        $a = $this->model("PostModel");
        // $kq = $a->getPostList();
        $this->dl = $a->getPostList();
        detailArr($this->dl);
        // $this->view('Post');
    }
}

?>