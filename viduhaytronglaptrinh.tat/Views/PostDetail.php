<?php require_once 'Views/includes/header.php' ?>
<link rel="stylesheet" href="public/css/post.css">
<link rel="stylesheet" href="public/css/postDetail.css">

<div class="post">
  <div class="post__header">
    <div class="post__header--content">
      <h1>Bài viết</h1>
      <p>Kho bài viết được chia sẻ bởi cộng đồng</p>
    </div>
    <div class="post__btn">
      <button class="btn--success-1">Viết bài</button>
    </div>
  </div>
  <div class="post__content">
    <div class="post__list">
      <div class="post__list--menu">
        <h2>Tiêu đề bài viết</h2>
        <div class="status">
          <div class="status-list">
            <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
            <p>Đã tạo</p>
            <p>8 giờ trước</p>
          </div>
          <div class="status-list">
            <i class="fas fa-thumbs-up"></i>
            <p>10</p>
            <p>lượt thích</p>
          </div>
          <div class="status-list">
            <i class="far fa-comments"></i>
            <p>2</p>
            <p>bình luận</p>
          </div>
          <div class="status-list">
            <i class="far fa-eye"></i>
            <p>10.000</p>
            <p>lượt xem</p>
          </div>
        </div>
        <div class="status__topic">  
          <h4>Chủ đề</h4>
          <a href="#">Học lập trình C</a>
        </div>
      </div>
      <div class="post__list--content" id="listPost">
        <div class="content__list">
          Nội dung bài viết ở đây 
          
        
        </div>

        <!-- Mở đàu bình luận -->
        <div class="content__list">
          <h3>Bình luận</h3>
          
          <div class="your__comment">
            <div href="" class="your__comment-left">
              <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
            </div>
            <div class="comment__wirte">
              <textarea name="" id="" cols="30" rows="10"></textarea>
              <button class="btn--success-1">
                <i class="fas fa-reply"></i>  
                Nhận xét
              </button>
            </div>
          </div>
          
          <!-- Bắt đàu 1 bình luận -->
          <div class="post__comment">
            <a href="" class="post__comment-left">
              <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
            </a>
            <div class="post__comment-body">
              <div class="comment-body__user">
                <a href="" class="user">
                  Hello
                </a>
                <p>8 giờ trước</p>
              </div>
              <div class="comment-body__content">
                <p class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae soluta quos illum, reiciendis cupiditate ipsa molestias quae rerum quod? Velit possimus expedita facere, reprehenderit excepturi alias et dignissimos illum rem?</p>
              </div>
              <div class="comment__report">
                <div></div>
                <div>
                  <button>
                    <i class="far fa-flag"></i>
                    Báo cáo
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Kết thúc 1 bịnh luận -->

          <div class="post__list-page">
            <div class="page-list">
              <a href="" class="pages-index">1</a>
              <a href="" class="pages-index">2</a>
              <a href="" class="pages-index">3</a>
            </div>
            <div class="next-page">
              <a href="">Next</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="post__slider">

    <!-- Mở đàu thông tin của user đăng bài viét này -->
      <div class="slider__user-post">
        <a href="#" class="user-post__header">
          <img src="public\img\img_user_admin.png" alt="user">
        </a>
        <a href="#">Tên</a>
        <div class="user-post__info">
          <div>
            <p>bài viết</p>
            <p>2</p>
          </div>
          <div>
            <p>Câu hỏi</p>
            <p>1</p>
          </div>
          <div>
            <p>Bình luận</p>
            <p>10</p>
          </div>
        </div>
      </div>

        <!--  Kết thúc thông tin user -->


    <!-- Mở đầu slider bên cạnh -->
      <div class="slider__questions">
        <div class="questions__header">
          <h3>Câu hỏi mới nhất </h3>
        </div>

        <div class="questions-list">

        <!--  mở đầu 1 item câu hỏi trong list câu hỏi mới nhất -->
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
        <!-- Kết thúc 1 item câu hỏi -->

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
</div>
<!-- 
<script>
  $(document).ready(function(){
    $.ajax({
      url: 'Questions/getAllQuestions',
      type: 'POST',
      data: null,
      success: function(response){

        $('#listPost').html(response);
        console.log('Thành công');
      }

    });
  });
</script> -->

<?php require_once 'Views/includes/footer.php' ?>
