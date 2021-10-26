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
            $result = $this->model("RegisterModel")->checkUser($_POST['user']);
            if($result['sl'] >= 1){
                echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Tên đăng nhập đã tồn tại, vui lòng chọn tên khác'
                ));
            }else{
                $_SESSION[$_POST['user']] = rand_string(10);
                $this->guiMailXacThuc($_POST['user'],$_POST['email'], $_SESSION[$_POST['user']]);
                echo json_encode(array(
                    'position' => '1',
                    'messenger' => 'Đăng Ký thành công, vui lòng kiểm tra email xác thực!'
                ));
            }
            // echo detailArr($result);
        }else{
            echo json_encode(array(
                    'position' => '0',
                    'messenger' => 'Đã có lỗi xảy ra!'
                ));
            }
    }
    function accountWaiting($name = null){
        if(isset($_SESSION[$name])){
            echo 'Thông tin xác thực tài khoản '.$name.' đã gửi tới email email của bạn!<br>Nếu quá 10 phút không có email gửi về hãy liên hệ 0123456789 để báo lỗi!';
        }else{
            header('Location: /Home');
        }
    }
    function xacThucTK($name= null, $params = null){
        if(isset($_SESSION[$name]) && $params == $_SESSION[$name]){
            unset($_SESSION[$name]);
            echo '<p>đã xác thực tài khoản thành công<p>
            <p><a href="/Login">Bấm vào đây để đăng nhập</a><p><br>';
        }else{
            header('Location: /Login');
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