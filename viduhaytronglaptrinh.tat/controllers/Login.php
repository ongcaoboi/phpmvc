<?php

//controller cho chức năng đăng nhập

class Login extends Controller {  
    function index(){
        if(isset($_COOKIE['cookie_account'])){
            $_SESSION['user'] = json_decode($_COOKIE['cookie_account']);
            echo detailArr($_SESSION['user']);
            exit;
        }
        if(isset($_SESSION['user'])){ // Kiểm tra tồn tại session user thì chuyển hướng tới trang chủ
            header("location: /Home");
            exit;
        }
        
        //Gọi tới view đăng nhập
        $this->title = "Đăng nhập";
        $this->view("Login");
    }
    // Hàm check thông tin đăng nhập
    function checkLogin(){  
        // Kiểm tra có tồn tại biết post user name vs password k
        if(isset($_POST['username']) && isset($_POST['password'])){
            $userName = $_POST['username'];
            $password = md5($_POST['password']);
            // gọi tới model login để xử lý, kiểm tra thông tin
            $model = $this->model('LoginModel');
            $result = $model->login($userName);
           
            if(!empty($result)){ //kiểm tra xem $result có rỗng không
                if($password == $result['user_password']){
                    $this->dataUser = array(
                        'id' => $result['id_user'],
                        'name' => is_null($result['user_display_name'])?$result['user_name']:$result['user_display_name'],
                        'img' => is_null($result['user_image'])?'public\img\user.png':$result['user_image'],
                    );
                    //Huỷ kết nối
                    $model->disConnect();
                    //Lưu thông tin đăng nhập vào session
                    $_SESSION['user'] = $this->dataUser;
                    //Kiểm tra xem có lưu mật khẩu k và lueu vào cookie
                    if($_POST['saveLogin'] == 'true'){
                        $expire = time()+60*60*24*7;
                        setcookie('cookie_account',json_encode($this->dataUser),$expire, '/');
                    }
                    // tạo mảng json và trả về client để xử lý
                    echo json_encode(array(
                        'position' => '1',
                        'messenger' => 'Đăng nhập thành công'
                    ));
                }
                else{
                    echo json_encode(array(
                        'position' => '0',
                        'messenger' => 'Sai mật khẩu'
                    ));
                }
            }
            else{
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Tên đăng nhập không tồn tại'
                ));
            }
        }
        else{
        echo json_encode(array(
                'position' => '0',
                'messenger' => 'Đã có lỗi xảy ra!'
            ));
        }
    }
    function logout(){
        // huy các session 
        unset($_SESSION['user']);
        //huỷ cookie
        setcookie( "cookie_account", "", time()- 60, "/");
        // chuyển hướng lại tới trang chủ
        header("location: /Home");
    }
}

?>