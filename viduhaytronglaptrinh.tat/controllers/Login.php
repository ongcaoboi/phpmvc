<?php

//controller cho chức năng đăng nhập

class Login extends Controller {  
    function index(){
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
            $password = $_POST['password'];
            //$model = $this->model('LoginModel');
            // gọi tới model login để xử lý, kiểm tra thông tin
            $model = $this->model('LoginModel');
            $result = $model->login($userName);
            //$result = $model->login($userName);
           
            if(!empty($result)){
                if($password == $result['user_password']){
                    $this->dataUser = array(
                        'id' => $result['id_user'],
                        'name' => is_null($result['user_display_name'])?$result['user_name']:$result['user_display_name'],
                        'img' => $result['user_image'],
                    );
                    
                    $model->disConnect();
                    $_SESSION['user'] = $this->dataUser;
                    echo json_encode(array(
                        'position' => '1',
                        'messenger' => 'Đăng nhập thành công'
                    ));
                }
                else{
                    // tạo mảng json và trả về view login
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
        // chuyển hướng lại tới trang chủ
        header("location: /Home");
    }
}

?>