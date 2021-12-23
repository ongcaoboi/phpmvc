<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/Feedback.css" />
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" > -->


<div class="Feedback">
<div class="left">
    <div class="containerLh">
        <h1><i class="far fa-paper-plane"></i>GỬI THÔNG TIN LIÊN HỆ - GÓP Ý</h1>
    </div>
    <div class="content">
        <h2><i>Góp ý hoặc liên hệ cho CodeEX nếu như bạn có nhu cầu về dịch vụ hoặc thắc mắc khác.</i></h2>
        <div class="noidung">
            <b>HỌ TÊN :</b>
            <input id="Fb_name" type="text">
        </div>
        <div class="noidung">
            <b>EMAIL :</b>
            <input id="Fb_email" type="text">
        </div>
        <div class="noidung">
            <b>SĐT :</b>
            <input id="Fb_sdt" type="text">
        </div>
        <div class="noidung">
            <b>TIÊU ĐỀ :</b>
            <input id="Fb_tieude" type="text">
        </div>
        <div class="noidung">
            <b>NỘI DUNG :</b>
            <textarea id="Fb_noidung"  rows="4" cols="50"></textarea>
        </div>
        <div class="btnSend">
            <div></div>
            <button class="btn btn--success">Gửi</button>
        </div>
    </div>
</div>

<div class="right">
    <div class="containerLh">
        <h1><i class="fas fa-info"></i>THÔNG TIN LIÊN HỆ KHÁC</h1>
    </div>
    <div class="content">
        <h2><i>Mọi thông tin đóng góp ý kiến hoặc hỗ trợ , người dùng có thể liên hệ trực tiếp qua các kênh sau :</i></h2>
        <p><i class="fas fa-phone-square-alt"></i><b>SĐT :</b> 0987654321</p>  
        <p><i class="fas fa-envelope"></i><b>Email:</b>diachiemail@gmail.com</p>   
        <p><i class="fab fa-facebook"></i><b>CodeEX PAGE:</b><a href=" ">CodeEX</a></p>           
    </div>
</div>
</div>

<?php require_once 'Views/includes/footer.php' ?>