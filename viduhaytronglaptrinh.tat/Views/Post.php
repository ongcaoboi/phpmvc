<?php require_once 'Views/includes/header.php' ?>
<link rel="stylesheet" href="public/css/post.css">

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
        <ul>
          <li><a href="">Bài viết</a></li>
          <li><a href="">Chủ đề</a></li>
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
      <div class="post__list--content" id="listPost">
        <div class="content__list">
          <div class="media">
            <a href="" class="media-left">
              <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
            </a>
            <div class="media-body">
              <a href="" class="user">
                Helo
              </a>
              <a href="" class="post">
                <div class="title">
                  <h3>Đây là tên</h3>
                  <a href="#" class="topic">VD</a>
                </div>
                <p class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae soluta quos illum, reiciendis cupiditate ipsa molestias quae rerum quod? Velit possimus expedita facere, reprehenderit excepturi alias et dignissimos illum rem?</p>
              </a>
              <div class="status">
                <p class="status-list">like</p>
                <p class="status-list">bình luận</p>
                <p class="status-list">lượt xem</p>
              </div>
            </div>
          </div>
        </div>
        <div class="content__list">
          <div class="media">
            <a href="" class="media-left">
              <img src="../public/img/img_user_admin.png" alt="ảnh">
            </a>
            <div class="media-body">
              <a href="" class="user">
                Helo
              </a>
              <a href="" class="post">
                <h3>Đây là tên</h3>
                <p class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae soluta quos illum, reiciendis cupiditate ipsa molestias quae rerum quod? Velit possimus expedita facere, reprehenderit excepturi alias et dignissimos illum rem?</p>
              </a>
              <div class="status">
                <p class="status-list">like</p>
                <p class="status-list">bình luận</p>
                <p class="status-list">lượt xem</p>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    <div class="post__slider">
      <div class="slider__topics">
        <div class="topics__header">
          <h3> Chủ đề nổi bật</h3>
        </div>
        <div class="topic-list">
          <a href="" class="topic-list__items">
            <p>Chủ đề 1</p>
          </a>
          <a href="" class="topic-list__items">
            <p>Chủ đề 2</p>
          </a>
          <a href="" class="topic-list__items">
            <p>Chủ đề 3</p>
          </a>
        </div>
      </div>
      <div class="slider__questions">
        <div class="questions__header">
          <h3>Câu hỏi mới nhất </h3>
        </div>
        
        <div class="questions-list">
          <a href="" class="questions-list__items">
            <h3>Đây là tên</h3>
            <div class="status">
              <p class="status-list">like</p>
              <p class="status-list">bình luận</p>
              <p class="status-list">lượt xem</p>
            </div>
          </a>
          
          <a href="" class="questions-list__items">
            <h3>Đây là tên</h3>
            <div class="status">
              <p class="status-list">like</p>
              <p class="status-list">bình luận</p>
              <p class="status-list">lượt xem</p>
            </div>
          </a>
          <a href="" class="questions-list__items">
            <h3>Đây là tên</h3>
            <div class="status">
              <p class="status-list">like</p>
              <p class="status-list">bình luận</p>
              <p class="status-list">lượt xem</p>
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
