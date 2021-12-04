<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <base href="<?php echo DOMAIN ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="public/css/reset.css" />

    <link href="public/fonts/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" />

    <script src="public/js/script.js"></script>
    <script src="public/js/thuvien.js"></script>

    <link rel="stylesheet" href="public/css/base.css" />
    <link rel="stylesheet" href="public/css/main.css" />
    <title id="title"><?php echo $this->title ?></title>
</head>

<body>
    <div class="app">
        <header class="header">
            <input type="checkbox" id="check-search">
            <div class="search-input__mobile">
                <label for="check-search" class="lopphu">
                </label>
                <input class="input__mobile" type="text" placeholder="Nhập nội dung">
                <input class="input__btn" type="button" value="Tìm">
            </div>
            <div class="grid">
                <nav class="header__navbar">
                    <div class="header__navbar-left">
                        <button class="header__btn-menu" id="btn-menu">
                            <i class="fas fa-bars f-9"></i>
                        </button>
                        <a href="" class="header__title">
                            Code <p>EX</p>
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
                        
                    <?php
                    //Kiểm tra xem có tồn tại user đang đăng nhập k
                        if(isset($_SESSION['user'])){
                            $user_img = is_null($_SESSION['user']['img'])?"public/img/user-3.png":$_SESSION['user']['img'];
                            // nếu có show menu chõ tài khoản  là ntn
                            echo ' 
                            <label for="check-search" class="btn-search__mobile">
                                <i class="fas fa-search"></i>
                            </label>
                            <button class="header__btn-write">
                                <i class="fa fa-pen"></i>
                            </button>
                        <div class="header__btn-account">
                            <img src="'.$user_img.'" alt="profile_pic" class="header__profile-img">
                            <p>'.$_SESSION['user']['name'].'</p> 
                            <div class="header__account-menu">
                                <a href="profile">
                                    <button class="btn btn--success">
                                        <span>Thông tin</span>
                                    </button>
                                </a>
                                <a href="./Login/logout">
                                    <button class="btn btn--primary">Đăng xuất
                                        <i class="fa fa-sign-out"></i>
                                    </button>
                                </a>
                            </div>';
                        }else{
                            // nếu k thì ntn
                            echo '
                            <label for="check-search"  class="btn-search__mobile">
                                <i class="fas fa-search"></i>
                            </label>
                        <div class="header__btn-account">
                            <img src="public/img/user-3.png" alt="profile_pic" class="header__profile-img">
                            <p>Tài khoản</p>
                            <div class="header__account-menu">
                                <a href="./Login">
                                    <button class="btn btn--success">Đăng nhập
                                    </button>
                                </a>
                                <a href="./Register">
                                    <button class="btn btn--primary">Đăng ký
                                    </button>
                                </a>
                            </div>';
                        } ?>
                        </div>
                    </div>
                    
                    <label for="check" class="header__btn-mobile">
                            <i class="fas fa-bars f-9"></i>
                    </label>
                    <input type="checkbox" name="" id="check" class="check-mobile">
                    
                    <!-- MENU cho MOBILE -->
                    
                    <div class="container__sidebar-mobile">
                        <label for="check" class="btn-close-mobile">
                            <i class="fas fa-times f-9"></i>
                        </label>
                        <nav class="container__sidebar-menu">
                            <?php
                            if(isset($_SESSION['user'])){
                                $user_img = is_null($_SESSION['user']['img'])?"public/img/user-3.png":$_SESSION['user']['img'];
                                echo '
                                <a href="" class="header__title">
                                    Code <p>EX</p>
                                </a>
                                <div class="profile-mobile">
                                    <div class="profile_img-mobile">
                                        <img src="'.$user_img.'" alt="profile_pic"/>
                                    </div>
                                    <div>
                                        <a href="profile" class="container__sidebar-info">'.$_SESSION['user']['name'].'</a>
                                    </div>
                                </div>
                            
                                ';
                            }else{
                                echo '
                                <a href="" class="header__title">
                                    Code <p>EX</p>
                                </a>
                            <div class="container__sidebar-profile">
                                <div class="container__sidebar-info1">
                                    <a href="./Login">
                                        <button type="button" class="btn btn--success ">Đăng nhập</button>
                                    </a>
                                    <a href="./Register">
                                        <button type="button" class="btn btn--primary  ">Đăng ký</button>
                                    </a>
                                </div>
                            </div>
                                ';
                            }
                            ?>
                            <ul class="container__sidebar-list">
                                <p class="container__sidebar-list"> Page</p>
                                <li class="container__sidebar-item">
                                    <a href="./Home" id="nav-link_1" class="container__sidebar-link">Trang chủ</a>
                                </li>
                                <li class="container__sidebar-item">
                                    <a href="./Post" id="nav-link_2" class="container__sidebar-link">Bài viết</a>
                                </li>
                                <li class="container__sidebar-item">
                                    <a href="./Questions" id="nav-link_3" class="container__sidebar-link">Câu hỏi</a>
                                </li>
                                <li class="container__sidebar-item">
                                    <a href="./About" id="nav-link_4" class="container__sidebar-link">Thông tin</a>
                                </li>
                                <li class="container__sidebar-item">
                                    <a href="./Feedback" id="nav-link_5" class="container__sidebar-link">Phản hồi</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

            <!-- KẾT THÚC MENU MOBLIE -->

                </nav>
            </div>
        </header>
        <div class="container">
            <div class="container__sidebar">
                <nav class="container__sidebar-menu">
                    <?php
                    if(isset($_SESSION['user'])){
                        $user_img = is_null($_SESSION['user']['img'])?"public/img/user-3.png":$_SESSION['user']['img'];
                        echo '
                    <div class="container__sidebar-profile">
                        <div class="sidebar__profile-img">
                            <img src="'.$user_img.'" alt="profile_pic" class="sidebar__profile-img" />
                            </div>
                        <div class="container__sidebar-info">
                            <a href="profile" class="container__sidebar-info">'.$_SESSION['user']['name'].'</a>
                        </div>
                    </div>
                        ';
                    }else{
                        echo '
                    <div class="container__sidebar-profile">
                        <div class="container__sidebar-info1">
                            <a href="./Login">
                                <button type="button" class="btn btn--success ">Đăng nhập</button>
                            </a>
                            <a href="./Register">
                                <button type="button" class="btn btn--primary  ">Đăng ký</button>
                            </a>
                        </div>
                    </div>
                        ';
                    }
                    ?>
                    <ul class="container__sidebar-list">
                        <p> Page</p>
                        <li class="container__sidebar-item">
                            <a href="./Home" id="nav-link1" class="container__sidebar-link">Trang chủ</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./Post" id="nav-link2" class="container__sidebar-link">Bài viết</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./Questions" id="nav-link3" class="container__sidebar-link">Câu hỏi</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./About" id="nav-link4" class="container__sidebar-link">Thông tin</a>
                        </li>
                        <li class="container__sidebar-item">
                            <a href="./Feedback" id="nav-link5" class="container__sidebar-link">Phản hồi</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="container__main">
                <div class="container__main-content">