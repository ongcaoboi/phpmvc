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
        if(!isset($_SESSION['user'])){
            header('Location: /Login');
            die;
        }
        $this->dl['listTopic'] = $this->model("PostModel")->getTopic();
        $this->title = "Viết bài";
        $this->view("PostWrite");
    }
    function postWrite(){
        if(!isset($_SESSION['user'])){
            $this->view("PageError");
            die;
        }
        if(isset($_POST['title']) || isset($_POST['data']) || isset($_POST['topic']) || !empty($_FILES['file'])){
            $duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
            $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
            $maxfilesize = 1048576;
            if($_FILES['file']['size'] > $maxfilesize){
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Kích cỡ file không được quá 1 megabyte!'
                ));
            die;
            }
            $userInfo = $this->model("ProfileModel")->getUser($_SESSION['user']['id']);
            $userName = $userInfo['user_name'];
            $userId = $userInfo['id_user'];
            $postTitle = $_POST['title'];
            $title_ = relayVNM($postTitle);
            $fileName = $title_.'.'.$duoi;
            $url = 'public/user/'.$userName.'/source/'.$fileName;
            $idTopic = $_POST['topic'];
            $postData = addslashes($_POST['data']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
                if($this->model('PostModel')->createPost($idTopic, $userId, $postTitle, $postData, $url)){
                    echo json_encode(array(
                        'position' => '1',
                        'messenger' => 'Tạo bài vết thành công!'
                    ));
                }else{
                    echo json_encode(array(
                        'position' => '0',
                        'messenger' => 'Đã có lỗi xảy ra 1!'
                    ));
                }
            }else{
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Đã có lỗi xảy ra 2!'
                ));
            }
            
        }else{
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đã có lỗi xảy ra 3!'
            ));
        }
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
        $this->model('PostModel')->viewPost($idPost ,$result['post_views']);
        $this->title = $result['post_title'];
        $this->dl['postDetails'] = $result;
        $this->dl['infoUserPost'] = $this->model('PostModel')->getInfoUserPost($result['id_user']);
        $keys = $str[rand(0, count($str)-2)];
        $kq = $this->model('PostModel')->getPostLikeTitle($keys);
        while($kq == null){
            $keys = $str[rand(0, count($str)-2)];
            $kq = $this->model('PostModel')->getPostLikeTitle($keys);
        }
        $this->dl['postLikeTitle'] = $kq;
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
        $model->disConnect();
        $this->view("PostDetail");
        
    }
    function page($param = null, $page = null){
        if(!is_numeric($page)|| $page <= 0){
            $page = 1;
        }
        $sodong = 13;
        $model = $this->model("PostModel");
        $sl = $model->getNumPost();
        if($sl['sl']%$sodong == 0){
            $sotrangdl = $sl['sl']/$sodong;
        }else{
            $sotrangdl = floor($sl['sl']/$sodong) + 1;
        }
        $this->dl['listQuestion'] = $this->model("PostModel")->getTopQuestion();
        $this->dl['listPost'] = $this->model("PostModel")->getTopPost();
        $this->dl['listTopic'] = $this->model("PostModel")->getTopTopic();
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
        $sodong = 13;
        $model = $this->model("PostModel");
        $sl = $model->getNumYourPost($_SESSION['user']['id']);
        if($sl['sl']%$sodong == 0){
            $sotrangdl = $sl['sl']/$sodong;
        }else{
            $sotrangdl = floor($sl['sl']/$sodong) + 1;
        }
        $this->dl['listQuestion'] = $this->model("PostModel")->getTopQuestion();
        $this->dl['listTopic'] = $this->model("PostModel")->getTopTopic();
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
            $idUser = $result[$i]['id_user'];
            $img = $result[$i]['img'] == null ? 'public\img\user.png' : $result[$i]['img'];
            if(isset($_SESSION['user'])){
                if($_SESSION['position'] == 2){
                    $arr['content'][$i] = '
                    <div class="post__comment--item">
                    <a href="profile/user/'.$idUser.'" class="post__comment-left">
                        <img src="'.$img.'" alt="ảnh">
                        
                    </a>
                    <div class="post__comment-body">
                        <div class="comment-body__user">
                        <a href="profile/user/'.$idUser.'" class="user">'.$name.'</a>
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
                            <button class="btn_delete_post" onclick="deleteComment('.$result[$i]['id'].')">
                                <i class="far fa-trash-alt"></i>
                            Xoá
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>';
                }else{
                    $arr['content'][$i] = '
                    <div class="post__comment--item">
                    <a href="profile/user/'.$idUser.'" class="post__comment-left">
                        <img src="'.$img.'" alt="ảnh">
                        
                    </a>
                    <div class="post__comment-body">
                        <div class="comment-body__user">
                        <a href="profile/user/'.$idUser.'" class="user">'.$name.'</a>
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
            }else{
                $arr['content'][$i] = '
                <div class="post__comment--item">
                  <a href="profile/user/'.$idUser.'" class="post__comment-left">
                    <img src="'.$img.'" alt="ảnh">
                    
                  </a>
                  <div class="post__comment-body">
                    <div class="comment-body__user">
                      <a href="profile/user/'.$idUser.'" class="user">'.$name.'</a>
                      <p>'.$result[$i]['date'].'</p>
                    </div>
                    <div class="comment-body__content">
                      <p class="content">'.$result[$i]['content'].'</p>
                    </div>
                  </div>
                </div>';
            }
        }
        echo json_encode($arr);
    }
    function report(){
        // detailArr($GLOBALS);
        // die;
        if(!isset($_SESSION['user']) || !isset($_POST['id']) || !isset($_POST['content'])){
            $this->view("PageError");
            die;
        }
        if($_POST['content'] == "" || $_POST['content'] == null){
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đã có lỗi xảy ra!'
            ));
            die;
        }
        if($this->model("PostModel")->report($_POST['id'], $_SESSION['user']['id'], $_POST['content'])){
            echo json_encode(array(
                'position' => '1',
                'messenger' => 'Báo cáo bài viết thành công!'
            ));
        }else{
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đã có lỗi xảy ra!'
            ));
        }
    }
}

?>