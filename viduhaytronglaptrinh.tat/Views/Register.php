<?php require_once 'Views/includes/header.php' ?>

<div class="register" style="margin: 70px;">
    <p>Nhập tên đăng nhập</p>
    <input type="text" class="register__name" id="name"><br>
    <p>Nhập email</p>
    <input type="text" class="register__email" id="email"><br>
    <p>Nhập mật khẩu</p>
    <input type="password" class="register__pass" id="pass"><br>
    <p>nhập lại mật khẩu</p>
    <input type="password" class="register__re-pass" id="re-pass"><br>
    <button id="dangKy">Đăng ký</button>
    <div id="thongBao" style="color: red;">

    </div>
</div>

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
            
            
            });
    });


</script>

<?php require_once 'Views/includes/footer.php' ?>