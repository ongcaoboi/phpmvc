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
    <link rel="stylesheet" href="public/css/pageLoad.css" />
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
                        <label><input type="checkbox" id="chapNhanDK"> Chấp nhận <a href="#">Điều khoản</a> và sử dụng dịch vụ!</label>
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
        <div id="load-page" class="load__page">
            <div id="ring" class="ring"></div>
            <div id="show__messenger" class="show__messenger">
                <a href="/register" class="btn_ok">OK!</a>
            </div>
        </div>
</body>

<script type="text/javascript">
// Cái này là để kiểm tra xem trang đã load hết chưa
// cái này còn gọi là call  back 
    $(document).ready(function(){
// load hết r mới gọi vô trong này
        $("#dangKy").on("click", function(){
        
            
            // var loadPage = document.querySelector("#load-page");
            // loadPage.classList.toggle("load_page-show");

            // var ring = document.querySelector("#ring");
            // var messenger = document.querySelector("#show__messenger");
            // ring.classList.toggle("load_page-hide");
            // messenger.classList.toggle("load_page-show");
            // return;

            var name = $("#name").val(); // lấy giá trị của thẻ có id là name
            if(name == ""){
                $("#thongBao").html("Tên không được để trống");
                return;
            }
            if(findVietnamese(name)){
                $("#thongBao").html("Tên không được có dấu hoặc khoảng trắng");
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
            
            var loadPage = document.querySelector("#load-page");
            loadPage.classList.toggle("load_page-show");
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
                    
                    if(rs.position == "0"){
                        alert(rs.messenger);
                        loadPage.classList.toggle("load_page-show");
                    }
                    else if(rs.position == "1") {
                        var ring = document.querySelector("#ring");
                        var messenger = document.querySelector("#show__messenger");
                        console.log(rs.messenger);

                        messenger.innerHTML = rs.messenger;

                        ring.classList.toggle("load_page-hide");
                        messenger.classList.toggle("load_page-show");

                    }
                    
                }
            });
            
        });
    });


</script>

</html>