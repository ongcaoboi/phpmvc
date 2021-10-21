<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <base href="http://viduhaytronglaptrinh.tat/" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="public/css/reset.css" />

    <link href="public/fonts/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" />

    <link rel="stylesheet" href="public/css/base.css" />
    <link rel="stylesheet" href="public/css/main.css" />
    <title><?php echo $this->title ?></title>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <div class="header__navbar-left">
                        <button class="header__btn-menu" id="btn-menu">
                            <i class="fas fa-bars f-9"></i>
                        </button>
                        <a href="" class="header__title">
                            logo Ví dụ hay trong lập trình
                        </a>
                    </div>
                    <div class="header__navbar-right">
                        <div class="header__search">
                            <input class="header__search-input" type="text" placeholder="Tìm kiếm">
                            <button class="sbutton">
                                <i class="fas fa-search"></i>
                            </button>
                            </input>
                        </div>
                        <button class="header__btn-write">
                            <i class="fa fa-pen"></i>
                        </button>
                        <div class="header__btn-account">
                            <img src="public/img/user-3.png" alt="profile_pic" class="header__profile-img">
                            <!-- <p>Tài khoản</p> -->
                            <!-- <i class="fa fa-caret-down"></i> -->
                            <?php
                            //Kiểm tra xem có tồn tại user đang đăng nhập k
                                if(isset($_SESSION['user'])){
                                    // nếu có show menu chõ tài khoản  là ntn
                                    echo '
                                    <div class="header__account-menu">
                                        <button class="account__btn-info">
                                            <span>Thông tin</span>
                                        </button>
                                        <button class="account__btn-logout">
                                            <a href="./Login/logout">Đăng xuất</a>
                                            <i class="fa fa-sign-out"></i>
                                        </button>
                                    </div>';
                                }else{
                                    // nếu k thì ntn
                                    echo 
                                    '<div class="header__account-menu">
                                        <button class="account__btn-info">
                                            <a href="./Login">Đăng nhập</a>
                                        </button>
                                        <button class="account__btn-logout">
                                            <a href="./Register">Đăng ký</a>
                                            <i class="fa fa-sign-out"></i>
                                        </button>
                                    </div>';
                                } ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">
            <div class="container__sidebar">
                <nav class="container__sidebar-menu">
                    <div class="container__sidebar-profile">
                        <div class="sidebar__profile-img">
                            <img src="public/img/user-3.png" alt="profile_pic" class="sidebar__profile-img" />
                        </div>
                        <div class="container__sidebar-info">
                            <a href="" class="container__sidebar-info">Alex John</a>
                        </div>
                    </div>
                    <ul class="container__sidebar-list">
                        <p class="container__sidebar-list"> Page</p>
                        <li class="container__sidebar-item">
                            <a href="./Home/" class="container__sidebar-link">Trang chủ</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./Post/" class="container__sidebar-link">Bài viết</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./Questions/" class="container__sidebar-link">Câu hỏi</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./About/" class="container__sidebar-link">Thông tin</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./Feedback/" class="container__sidebar-link">Phản hồi</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="container__main">
                <div class="container__main-content">