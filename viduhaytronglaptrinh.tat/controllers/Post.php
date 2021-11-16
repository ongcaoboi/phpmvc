<?php

class Post extends Controller {
    public $dl = [];
    function index() {
        $this->title = "Bài viết";
        // $this->view("Post");
        $this->page('news',1);
        
    }
    function details($str = null) {
        if(!is_string($str)){
            $this->view('PageError');
            die;
        }
        $str = explode("-", $str);
        $idPost = $str[count($str)-1];
        $model = $this->model("PostModel");
        $result = $model->getPostDetails($idPost);
        if(!is_array($result)){
            $this->view('PageError');
            $model->disConnect();
            die;
        }
        $this->title = $result['post_title'];
        // detailArr($result);
        $this->dl['postDetails'] = $result;
        $this->dl['infoUserPost'] = $this->model('PostModel')->getInfoUserPost($result['id_user']);
        // detailArr($this->dl);
        $model->disConnect();
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
    function getComment(){
        if(!isset($_POST['id']) || !isset($_POST['page'])){
            die;
        }
        $sodong = 5;
        $id = $_POST['id'];
        $pageDB = $this->model("PostModel")->countCommentInPost($id);
        $page = $_POST['page'];
        if($pageDB['sl'] == 0){
            $arr['type'] = 2;
            echo json_encode($arr);
            die;
        }
        if(!is_numeric($page) || $page < 0 || $page * $sodong >= $pageDB['sl']){
            die;
        }
        if($pageDB['sl'] % $sodong == 0){
            $pageDB = $pageDB['sl']/$sodong;
        }else {
            $pageDB = floor($pageDB['sl']/$sodong) +1;
        }
        $arr['type'] = '1'; 
        if($page+1 >= $pageDB){
            $arr['type'] = '0';
        }
        $model = $this->model("PostModel");
        $check = $model->isPost($id);
        if(!$check['sl'] >= 1){
            $this->view("PageError");
            $model->disConnect();
            die;
        }
        $result = $model->getCommentInPost($id, $page, $sodong);
        // detailArr($result);
        // return;
        for($i= 0; $i< count($result); $i++){
            $name = $result[$i]['dp_name'] == null? $result[$i]['name']:$result[$i]['dp_name'];
            $img = $result[$i]['img'] == null ? 'public\img\user.png' : $result[$i]['img'];
            $arr['content'][$i] = '
            <div class="post__comment--item">
              <a href="" class="post__comment-left">
                <img src="'.$img.'" alt="ảnh">
                
              </a>
              <div class="post__comment-body">
                <div class="comment-body__user">
                  <a href="" class="user">'.$name.'</a>
                  <p>'.$result[$i]['date'].'</p>
                </div>
                <div class="comment-body__content">
                  <p class="content">'.$result[$i]['content'].'</p>
                </div>
                
                <div class="comment__report">
                  <div></div>
                  <div>
                    <button>
                      <i class="far fa-flag"></i>
                      Báo cáo
                    </button>
                  </div>
                </div>
              </div>
            </div>';
        }
        echo json_encode($arr);
    }
}

?>