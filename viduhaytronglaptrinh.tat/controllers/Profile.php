<?php

class Profile extends Controller {
    public $ps;
    public $dl = [];
    function index() {
        if($_SESSION['user']){
            $kq = $this->model("ProfileModel")->getUser($_SESSION['user']['id']);
            $this->dl = $kq;
            $this->ps = 1;
        }else{
            $this->view("PageError");
            die;
        }
        $this->title = "Thông tin cá nhân".$this->dl['user_name']."!";

        $this->view("Profile");
    }
    function doiMatKhau(){
        if(isset($_POST['mkc']) & isset($_POST['mkm'])){
            $user = $this->model("ProfileModel")->getUser($_SESSION['user']['id']);
            if($user['user_password'] == md5($_POST['mkc'])){
                if($this->model("ProfileModel")->doiMk($_SESSION['user']['id'],md5($_POST['mkm']))){
                    
                    echo json_encode(array(
                        'position' => '1',
                        'messenger' => 'Đổi mật khẩu thành công!'
                    ));
                }else{
                    echo json_encode(array(
                        'position' => '0',
                        'messenger' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!'
                    ));
                }
            }else {
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Nhập mật khẩu cũ không chính xác!'
                ));
            }
        }else{
            echo 'Lỗi';
        }
    }

    function doiTenHienThi(){
        if(isset($_POST['mk']) & isset($_POST['newDisplayname'])){
            $user = $this->model("ProfileModel")->getUser($_SESSION['user']['id']);
            // detailArr($user);
            // echo md5($_POST['mk']);
            // die;
            if($user['user_password'] == md5($_POST['mk'])){
                if($this->model("ProfileModel")->doiTenhienthi($_SESSION['user']['id'],($_POST['newDisplayname']))){
                    
                    $model = $this->model('LoginModel');
                    $result = $model->login($user['user_name']);
                    $_SESSION['user'] = array(
                        'id' => $result['id_user'],
                        'name' => is_null($result['user_display_name'])?$result['user_name']:$result['user_display_name'],
                        'img' => is_null($result['user_image'])?'public\img\user.png':$result['user_image'],
                    );
                    $model->disConnect();
                    echo json_encode(array(
                        'position' => '1',
                        'messenger' => 'Đổi tên hiển thị thành công!'
                    ));
                }else{
                    echo json_encode(array(
                        'position' => '0',
                        'messenger' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!'
                    ));
                }
            }else {
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Nhập mật khẩu không chính xác!'
                ));
            }
        }else{
            echo 'Lỗi';
        }
    }
    function user($id){
        if(is_numeric($id)){
            $kq = $this->model("ProfileModel")->checkUser($id);
            if($kq['sl'] >= 1){
                $kq = $this->model("ProfileModel")->getUser($id);
                $this->ps = 0;
                $this->dl = $kq;
                $this->title = "Thông tin cá nhân".$this->dl['user_name']."!";
        
                $this->view("Profile");
            }else{
                $this->view("PageError");
                die;
            }
        }else{
            $this->view("PageError");
            die;
        }
    }
    function doiimg(){
        if(!isset($_SESSION['user'])){
            $this->view("PageError");
            die;
        }
        if (isset($_POST) && !empty($_FILES['file'])) {
            
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
            if(!getimagesize($_FILES['file']["tmp_name"])){
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Chỉ được upload ảnh!'
                ));
                die;
            }
            // Kiểm tra xem có phải file ảnh không
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi == 'gif' || $duoi == 'jpeg') {
                $userInfo = $this->model("ProfileModel")->getUser($_SESSION['user']['id']);
                $userName = $userInfo['user_name'];
                $userId = $userInfo['id_user'];
                $fileName = $userName.'.'.$duoi;
                $url = './public/user/'.$userName.'/display_img/'.$fileName;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
                    // Nếu thành công
                    if($this->model("ProfileModel")->doiImage($userId, $url)){
                        $model = $this->model('LoginModel');
                        $result = $model->login($userInfo['user_name']);
                        $_SESSION['user'] = array(
                            'id' => $result['id_user'],
                            'name' => is_null($result['user_display_name'])?$result['user_name']:$result['user_display_name'],
                            'img' => is_null($result['user_image'])?'public\img\user.png':$result['user_image'],
                        );
                        $model->disConnect();
                        echo json_encode(array(
                            'position' => '1',
                            'messenger' => 'Đổi ảnh thành công!'
                        ));
                    }else{
                        echo json_encode(array(
                            'position' => '0',
                            'messenger' => 'Đổi ảnh thất bại!'
                        ));
                        die; //in ra thông báo + tên file
                    }
                } else { // nếu không thành công
                    echo json_encode(array(
                            'position' => '0',
                            'messenger' => 'Upload file thất bại!'
                        ));
                    die; // in ra thông báo
                }
            } else { 
                echo json_encode(array(
                        'position' => '0',
                        'messenger' => 'Chỉ được upload ảnh!'
                    ));
                die; // in ra thông báo
            }
        } else {
            echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đã có lỗi xảy ra!'
            ));
        }
    }
}

?>