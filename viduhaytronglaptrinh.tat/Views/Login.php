<?php require_once 'Views/includes/header.php' ?>

<div class="login" style="margin: 70px;">
    Tên đăng nhập <br>
    <input type="text" id="user"> <br>
    Mật khẩu <br>
    <input type="password" id="pass"> <br>
    <button id="Login-submit">Đăng nhập</button> <br>
    <div id="error" style="color: red;"></div>
</div>
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
                url: 'Login/CheckLogin', // thay cho action trong form 
                type: 'POST', // thay cho method
                data: { // đây là mảng dữ liệu đc gửi đi
                    'username': user,
                    'password': pass
                },
                success: function(response){
                    // hàm này hứng dữ liệu trả về , là cái json hồi nãy ấy
                    var rs = JSON.parse(response);
                    console.log(rs);
                    alert(rs.messenger);
                    if(rs.position == "1"){
                        window.location.href = 'Home/';
                    }
                } 
            });
        });
    });

</script>

<?php require_once 'Views/includes/footer.php' ?>