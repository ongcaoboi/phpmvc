<?php 

class Register extends Controller {
    function index(){
        if(isset($_SESSION['user'])){ // Kiểm tra tồn tại session user thì chuyển hướng tới trang chủ
            header("location: /Home");
            exit;
        }
        $this->title = "Đăng ký tài khoản";
        $this->view("Register");
    }
    function checkRegister(){
        if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass'])){
            $user = $_POST['user'];
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            $result = $this->model("RegisterModel")->checkUser($user);
            if($result['sl'] >= 1){
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Tên người dùng đã tồn tại, vui lòng chọn tên khác'
                ));
            }else{
                if($this->model("RegisterModel")->checkTKCho($user)['sl']>=1){
                    echo json_encode(array(
                        'position' => '0',
                        'messenger' => 'Tài khoản '.$user.' đang được chờ xác thực!'
                    ));
                }else{
                    $ma = rand_string(10);
                    if($this->model("RegisterModel")->createTKCho($user,$ma, $email, $pass)){
                        $this->guiMailXacThuc($user,$email,$ma);
                        echo json_encode(array(
                            'position' => '1',
                            'messenger' => 'Đăng Ký tài khoản '.$user.' thành công, vui lòng kiểm tra email xác thực!'
                        ));
                    }
                    else {
                        echo json_encode(array(
                            'position' => '0',
                            'messenger' => 'Lỗi hệ thống, vui lòng thử lại!'
                        ));
                    }
                }
            }
            // echo detailArr($result);
        }else{
            echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Đã có lỗi xảy ra!'
                ));
            }
    }
    function xacThucTK($name= null, $param = null){

        $result = $this->model("RegisterModel")->checkTKChoVoiMa($name, $param);
        if(!empty($result) && $result['name']==$name && $result['ma']==$param){
            if($this->model("RegisterModel")->createUser($result['name'],$result['email'],$result['pass'])){
                $this->model("RegisterModel")->deleteTKCho($name);
                echo '<p>đã xác thực tài khoản thành công<p>
            <p><a href="/Login">Bấm vào đây để đăng nhập</a><p><br>';
            }else{
                $this->view('PageError');
            }
        }else{
            $this->view('PageError');
        }
    }
    function guiMailXacThuc($tenTk, $mailNguoiNhan, $maXacNhan){
            
        require "PHPMailer-master/src/PHPMailer.php"; 
        require "PHPMailer-master/src/SMTP.php"; 
        require 'PHPMailer-master/src/Exception.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'codeexamplemail@gmail.com'; // SMTP username
            $mail->Password = '1134788964a';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to   587/465              
            $mail->setFrom('codeexamplemail@gmail.com', 'CodeEX' ); 
            $mail->addAddress($mailNguoiNhan, 'xác thực'); //mail và tên người nhận  
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Xác thực tài khoản';
            $noidungthu = "
            <h3>Đây là email xác thực tài khoản $tenTk</h3><br>
            <a href='".DOMAIN."Register/xacThucTK/$tenTk/$maXacNhan'>Bấm vào đây để xác thực</a>
            "; 
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                    "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            // echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            // echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }
}

?>