<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
    <base href="<?php echo DOMAIN ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dăng nhập</title>
     <link rel="stylesheet" href="public/css/Login.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="public/js/thuvien.js"></script>
</head>
<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <img src="public\img\e61df3c3768380ddd992.jpg" alt="">
            <!--<img src="thêm hình ảnh tại đây">-->
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>Trang Đăng Nhập</h2>
                <div id="error" style="color: red;"></div>
                <div>
                    <div class="input-form">
                        <span>Tên Người Dùng</span>
                        <input type="text" id="user">
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" id="pass">
                    </div>
                    <div class="nho-dang-nhap">
                        <label><input type="checkbox" id="saveLogin"> Nhớ mật khẩu</label>
                    </div>
                    <div class="input-form">
                        <input type="button" id="Login-submit" value="Đăng nhập"/>
                    </div>
                    <div class="input-form">
                        <p>Bạn Chưa Có Tài Khoản? <a href="Register">Đăng Ký</a></p>
                    </div>
                </div>
                <h3>Đăng Nhập Bằng Mạng Xã Hội</h3>
                <ul class="icon-dang-nhap">
                    <li>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </li>
                    <li>
                        <i class="fa fa-google" aria-hidden="true"></i>
                    </li>
                    <li>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </li>
                </ul>
                <div class="input-form">
                    <p>Quay về <a href="Home">Trang chủ</a></p>
                </div>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#Login-submit').on("click", function(){
            var user = $('#user').val();
            var pass = $('#pass').val();


            if(user == ""){
                $("#error").html("<b>Tên tài khoản không được để trống</b>");
                return false;
            }
            if(pass == ""){
                $("#error").html("<b>Mật khẩu không được để trống</b>");
                return false;
            }
            $.ajax({
                // gửi dl đến sever thông qua ajax :)) gây lú cực 
                // nó hỗ trợ gửi dữ liệu đến sever mà k cần load lại trang như dùng form Post trong php
                url: 'Login/checkLogin', // thay cho action trong form 
                type: 'POST', // thay cho method
                data: { // đây là mảng dữ liệu đc gửi đi
                    'username': user,
                    'password': pass
                },
                success: function(response){
                    // hàm này hứng dữ liệu trả về , là cái json hồi nãy ấy
                    var rs = JSON.parse(response);
                    alert(rs.messenger);
                    if(rs.position == "1"){
                        window.location.href = '/Home';
                    }
                } 
            });
        });
    });

</script>

</html>