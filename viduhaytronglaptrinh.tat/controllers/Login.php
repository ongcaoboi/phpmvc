<?php

class Login extends Controller {
    function index(){
        $this->title = "Đăng nhập";
        $this->view("Login");
    }
    function checkLogin(){
        if(isset($_POST['username']) && isset($_POST['password'])){
            $userName = $_POST['username'];
            $password = $_POST['password'];
            //$model = $this->model('LoginModel');
            $result = $this->model('LoginModel')->login($userName);
            //$result = $model->login($userName);
           
            if(!empty($result)){
                if($password == $result['user_password']){
                    $this->dataUser = array(
                        'id' => $result['id_user'],
                        'name' => $result['user_name'],
                        'displayName' => $result['user_display_name'],
                    );
                    $_SESSION['user'] = $this->dataUser;
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
                    'messenger' => 'Tên đănh nhập không tồn tại'
                ));
            }
            
        }
        else{
        echo json_encode(array(
                'position' => '0',
                'messenger' => 'không có dữ liệu gửi đi'
            ));
        }
    }
}

?>