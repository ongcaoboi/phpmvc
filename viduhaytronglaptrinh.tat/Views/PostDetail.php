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
        Tiêu đề viét ở đây
      </div>
      <div class="post__list--content" id="listPost">
        <div class="content__list">
      Nội dung viết ở đây
        </div>
        <div class="content__list">
        Bình luận viết ở đây
        
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
      <div class="slider__user-post">


        <!--  thông rin user đăng pôst viết ở đây -->



      </div>
      <div class="slider__questions">
        <div class="questions__header">
          <h3>Câu hỏi mới nhất </h3>
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
