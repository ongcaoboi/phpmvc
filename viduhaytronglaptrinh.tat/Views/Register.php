<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
    <base href="<?php echo DOMAIN ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Đăng ký</title>
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
                <h2>Đăng Ký</h2>
                <div id="thongBao" style="color: red;"></div>
                <div>
                    <div class="input-form">
                        <span>Tên Người Dùng</span>
                        <input type="text" id="name">
                    </div>
                    <div class="input-form">
                        <span>Email</span>
                        <input type="email" id="email" maxlength="256" placeholder="user@example.gov" multiple>
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" id="pass">
                    </div>
                    <div class="input-form">
                        <span>Xác nhận Mật Khẩu</span>
                        <input type="password" id="re-pass">
                    </div>
                    <div class="dieu-khoan">
                        <label><input type="checkbox" id="chapNhanDK"> Chấp nhận <a href="#">Điều khoản</a> và xử dụng dịch vụ!</label>
                    </div>
                    <div class="input-form">
                        <input type="button" value="Đăng Ký Ngay!" id="dangKy">
                    </div>
                    <div class="input-form">
                        <p>Bạn Đã Có Tài Khoản? <a href="Login">Đăng Nhập</a></p>
                    </div>
                </div>
                <div class="input-form">
                    <p>Quay về <a href="Home">Trang chủ</a></p>
                </div>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>

<script type="text/javascript">
// Cái này là để kiểm tra xem trang đã load hết chưa
// cái này còn gọi là call  back 
    $(document).ready(function(){
// load hết r mới gọi vô trong này
        $("#dangKy").on("click", function(){

            var name = $("#name").val(); // lấy giá trị của thẻ có id là name
            if(name == ""){
                $("#thongBao").html("Tên không được để trống");
                return;
            }
            var email = $("#email").val();
            if(email == ""){
                $("#thongBao").html("Email không được để trống");
                return;
            }
            if(!checkEmail(email)){
                $("#thongBao").html("Địa chỉ email không hợp lệ");
                return;
            }
            var pass = $("#pass").val();
            if(pass == ""){
                $("#thongBao").html("Mật khẩu không được để trống");
                return;
            }
            var re_pass = $("#re-pass").val();
            if(pass != re_pass){
                $("#thongBao").html("Mật khẩu nhập lại không đúng");
                return;
            }
            if(!$("#chapNhanDK").prop("checked")){
                $("#thongBao").html("Vui lòng chấp nhận điều khoản");
                return;
            }
            // if(!document.getElementById("chapNhanDK").checked){
            //     $("#thongBao").html("Vui lòng chấp nhận điều khoản");
            //     return;
            // }
            
            $.ajax({
                url: './Register/checkRegister',
                type: 'post',
                data: {
                    'user': name,
                    'email': email,
                    'pass': pass
                },
                success: function(response){
                    var rs = JSON.parse(response);
                    alert(rs.messenger);
                    if(rs.position == "1"){
                        window.location.href = './Register/accountWaiting/'+name;
                    }
                }
            });
            
        });
    });


</script>

</html>