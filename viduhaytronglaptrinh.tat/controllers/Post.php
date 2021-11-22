<?php

class Post extends Controller {
    public $dl = [];
    function index() {
        $this->title = "Bài viết";
        // $this->view("Post");
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
                    if($this->model("PostModel")->comment($_POST['id'],$_SESSION['user']['id'], $_POST['content'])){
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
    function write(){
        // if(!isset($_SESSION['user'])){
        //     header('Location: /Login');
        //     die;
        // }
        $this->title = "Viết bài";
        $this->view("PostWrite");
    }
    function details($str = null) {
        if(!is_string($str)){
            $this->view('PageError');
            die;
        }
        $str = explode("-", $str);
        $idPost = $str[count($str)-1];
        if(!is_numeric($idPost)){
            $this->view('PageError');
            die;
        }
        $model = $this->model("PostModel");
        $result = $model->getPostDetails($idPost);
        if(!is_array($result)){
            $this->view('PageError');
            $model->disConnect();
            die;
        }
        $this->title = $result['post_title'];
        $this->dl['postDetails'] = $result;
        $this->dl['infoUserPost'] = $this->model('PostModel')->getInfoUserPost($result['id_user']);
        $keys = $str[rand(0, count($str)-2)];
        $this->dl['postLikeTitle'] = $this->model('PostModel')->getPostLikeTitle($keys);
        $t  = -1;
        for ($i=0; $i < count($this->dl['postLikeTitle']); $i++) { 
            if($this->dl['postLikeTitle'][$i]['id_post'] == $idPost){
                $t = $i;
                break;
            }
        }
        if($t != -1){
            array_splice($this->dl['postLikeTitle'], $t, 1);
            // unset($this->dl['postLikeTitle'][$t]);
            // array_values($this->dl['postLikeTitle']);  
        }
        // detailArr($this->dl);

        // $idTopic =  $this->dl['infoUserPost']['id_topic'];

        $model->disConnect();
        $this->view("PostDetail");
        
    }
    function page($param = null, $page = null){
        if(!is_numeric($page)|| $page <= 0){
            $page = 1;
        }
        $sodong = 10;
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
        $sodong = 10;
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
        $vtbd = $page*$sodong;
        $result = $model->getCommentInPost($id, $vtbd, $sodong);
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