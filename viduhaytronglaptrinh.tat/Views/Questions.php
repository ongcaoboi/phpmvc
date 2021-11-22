<?php require_once 'Views/includes/header.php' ?>
<link rel="stylesheet" href="public/css/question.css"/>

<div class="top">
    <div class="question_header">
        <h1>Hỏi Đáp</h1>
        <p>Chia sẻ kiến thức , cùng nhau phát triển</p>
    </div>
    <div class="header_button">
        <button class="question_button btn--success-1"><h3>Đặt câu hỏi</h3></button>
    </div>
</div>
<div class="question__content">
    <div class="left">
        <div class="question_list_menu">
            <ul>
                <li><a href="">Tất cả</a></li>
                <li><a href="">Bài viết của tôi</a></li>
            </ul>
            <div>
                <p>Sắp xếp</p>
                <select name="" id="">
                    <option value="1">Mới nhất</option>
                    <option value="2">Lượt xem</option>
                </select>
            </div>
        </div>
        <div class="question_list_content" id="listQuestion">
            <div class="content">
                <div class="media">
                    <a href="" class="media-left">
                    <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
                    </a>
                </div>   
                <div class="media-body">
                    <a href="" class="user">
                        <h3>Tên gì?</h3>
                    </a>
                    <a href="" class="post">
                        <div class="title"> 
                        <h3>Đây là 1 câu của một bài hát</h3>
                        </div>
                            <p class="content">Lướt qua cầu Bồng Sơn <br>
                                Anh đang lên ga con đường về nhà ngắn thêm <br>
                    </a>
                    <div class="question__status">
                        <div class="status-list">
                            <i class="fas fa-thumbs-up"></i>
                            <p>99</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-comments"></i>
                            <p>99999</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-eye"></i>
                            <p>999</p>
                        </div>
                        <div class="status-list-img">
                            <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
                            <p>9 giờ trước</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="media">
                    <a href="" class="media-left">
                    <img src="public/img/img_user_admin.png" alt="ảnh">
                    </a>
                </div>   
                <div class="media-body">
                    <a href="" class="user">
                        <h3>Tên gì?</h3>
                    </a>
                    <a href="" class="post">
                        <div class="title"> 
                        <h3>Đây là 1 câu của một bài hát</h3>
                        </div>
                            <p class="content">Lướt qua cầu Bồng Sơn <br>
                                Anh đang lên ga con đường về nhà ngắn thêm <br>
                    </a>
                    <div class="question__status">
                        <div class="status-list">
                            <i class="fas fa-thumbs-up"></i>
                            <p>99</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-comments"></i>
                            <p>99999</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-eye"></i>
                            <p>999</p>
                        </div>
                        <div class="status-list-img">
                            <img src="public/img/img_user_admin.png" alt="ảnh">
                            <p>9 giờ trước</p>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>

    </div>
    <div class="right">
        <div class="slider__questions">
            <div class="questions__header-">
                 <h2>Câu hỏi mới nhất </h2>
            </div>
            <div class="questions-list">
                <a href="" class="questions-list__items">
                    <h3>Đây là tên</h3>
                    <div class="status">
                        <div class="status-list">
                            <i class="fas fa-thumbs-up"></i>
                            <p>10</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-comments"></i>
                            <p>2</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-eye"></i>
                            <p>10.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="questions-list">
                <a href="" class="questions-list__items">
                    <h3>Đây là tên</h3>
                    <div class="status">
                        <div class="status-list">
                            <i class="fas fa-thumbs-up"></i>
                            <p>10</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-comments"></i>
                            <p>2</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-eye"></i>
                            <p>10.000</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>  
</div>
<?php require_once 'Views/includes/footer.php' ?>