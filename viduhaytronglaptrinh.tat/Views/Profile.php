
<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/Profile.css" />
<?php 
    $arr = $this->dl;
    $username = $arr['user_name'];
    $displayName = $arr['user_display_name'];
    if(is_null($displayName) ){
        $displayName = $username;
    } 
    $email = $arr['user_email'];
    $nttk = $arr['user_date_create'];
    $image = is_null($arr['user_image'])? 'public\img\user.png':$arr['user_image'];

?>

<?php 
    if($this->ps == 1){
    echo '
<div class="profile">
    <div class="profile__header">
        <div class="profile__header--content">
            <h1>Thông tin cá nhân</h1>
            <p>Hiển thị để xem & chỉnh sửa thông tin cá nhân</p>
        </div>
    </div>    
    <div class="profile__content">
        <div class="container">
            <div class="noi-dung">
                <p><b>TÊN ĐĂNG NHẬP:</b>       '.$username.'</p>
                <p><b>MẬT KHẨU:</b>          ******      </p>
                <p><b>TÊN HIỂN THỊ:</b>        '.$displayName.'</p>
                <p><b>EMAIL:</b>               '.$email.'</p>
                <p><b>NGÀY TẠO TÀI KHOẢN:</b>  '.$nttk.'</p>
                <div class="anh">
                    <p><b>IMAGE:</b></p>            <img src="'.$image.'">
                </div>
                
            </div>
            <div class="btn_">
                <div class="btn1">
                        <button id="btn_dmk" onclick="doimatkhau()">Đổi mật khẩu</button>
                </div>
                <div class="btn2">
                        <button id="btn_dtht" onclick="doitenhienthi()">Đổi tên hiển thị</button>
                </div>
                <div class="btn3">
                        <button id="btn_dimg" onclick="doiimg()">Đổi ảnh đại diện</button>
                </div>
            </div>
            
    
        <div class="container_change" id="container_pass">
            <div class="btn_quit">
                <button id="quit" onclick="quit2()">X</button>
             </div>
             <h2><b>ĐỔI MẬT KHẨU</b></h2>
             <p>Nhập mật khẩu cũ        :
             <input id="mk_c" type="password"></p>
             <p>Nhập mật khẩu mới      :
                <input id="mk_m" type="password"></p>
             <p>Nhập lại mật khẩu mới :
                <input id="mk_m_nl" type="password"></p>
            <button id="dmk" onclick="doimatkhau1()">Xác nhận</button>
        </div>

        <div class="container_change" id="container_chgDisplayName">
            <div class="btn_quit">
                <button id="quit" onclick="quit()">X</button>
             </div>
             <h2><b>ĐỔI TÊN HIỂN THỊ</b></h2>
             <p>Nhập tên hiển thị mới :
             <input id="new_displayName" type="text"></p>
             <p>Nhập mật khẩu           :
             <input id="mk" type="password"><p>
            <button id="btn_chgDisplayName" onclick="chgDisplayName1()">Xác nhận</button>
        </div>

        <div class="container_change" id="container_chgImage">
        <div class="btn_quit">
            <button id="quit" onclick="quit1()">X</button>
         </div>
         <h2><b>ĐỔI ẢNH ĐẠI DIỆN</b></h2>
            <p></p>
            <p></p>
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="file">Chọn ảnh :</label>
                    <input id="file" type="file" name="sortpic" required=""/>
                </div>
                
                <div class="form-group">
                    <button id="upload">Tải lên</button>
                </div>
            </form>
            <div class="status alert alert-success"></div>
    
    </div>
    </div>
    </div>
</div>
    ';
    }elseif($this->ps == 0){
        echo '
<div class="profile">
    <div class="profile__header">
        <div class="profile__header--content">
            <h1>Thông tin tài khoản</h1>
        </div>
    </div>    
    <div class="profile__content">
        <div class="container">
            <div class="noi-dung">
                <p><b>TÊN:</b>        '.$displayName.'</p>
                <div class="anh">
                    <p><b>IMAGE:</b></p>            <img src="'.$image.'">
                </div>
                
            </div>
        </div>
    </div>
</div>
    ';
    }
    
?>

 

<script src="public/js/Profile.js"></script>
<?php require_once 'Views/includes/footer.php' ?>
