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
                url: 'Login/CheckLogin',
                type: 'POST',
                data: {
                    'username': user,
                    'password': pass
                },
                success: function(response){
                    var rs = JSON.parse(response);
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