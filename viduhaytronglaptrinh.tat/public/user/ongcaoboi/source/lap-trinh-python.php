<?php
require 'site.php';
if(isset($_POST['user_name']) && isset($_POST['user_pass']) ){
  $conn = mysqli_connect("localhost", "root", "", "protinchi2") or die("không thể kết nối");
	mysqli_query($conn, "SET NAMES 'utf8'");
  $user_name = $_POST['user_name'];
  $user_pass = $_POST['user_pass'];
  $sql = "SELECT * from `tbgiangvien` where `magiangvien`='{$user_name}' and `matkhau`='{$user_pass}'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['user'] = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    if($_SESSION['user']['magiangvien'] == $user_name && $_SESSION['user']['matkhau'] == $user_pass){
    load_top();
    load_header();
    load_menu_gv();
    load_footer();
    die;
    }else{
      
    echo '<h3 style="color: red;">Tên tài khoản hoặc mật khẩu không chính xác</h3>';
    }
  }else{
    echo '<h3 style="color: red;">Tên tài khoản hoặc mật khẩu không chính xác</h3>';
  }
}

load_top();
load_header();
load_menu();
?>
<br>
<h2>Đăng nhập</h2>
<br>
<form action="dangnhap.php" method="POST">
  <p>Tên đăng nhập</p>
  <input type="text" name="user_name">
  <p>Mật khẩu</p>
  <input type="password" name="user_pass">
  <br>
  <input type="submit" value="Login">
</form>
<br>
<?php
load_footer();
?>