<?php require_once 'Views/includes/header.php' ?>
<link rel="stylesheet" href="public/prism/prism.css">
<script src="public/prism/prism.js"></script>
<link rel="stylesheet" href="public/css/post.css">
<link rel="stylesheet" href="public/css/postDetail.css">
<script src="public/js/postDetail.js"></script>

<?php
$arr = $this->dl['postDetails'];
$idPost = $arr['id_post'];
$title = $arr['post_title'];
$idTopic = $arr['id_topic'];
$topic = $arr['topic_name'];
$content = $arr['post_content'];
$like = $arr['slLikes'];
$comment = $arr['slComment'];
$view = $arr['post_views'];
$time = $arr['post_date_created'];

$arrUser = $this->dl['infoUserPost'];
$idUserPost = $arrUser['id'];
$nameUserPost = $arrUser['dp_name'] == null ? $arrUser['name'] : $arrUser['dp_name'];
$imgUserPost = $arrUser['img'] == null ? 'public\img\user.png' : $arrUser['img'];
$postUserPost = $arrUser['post'];
$questionUserPost = $arrUser['question'];
$commentUserPost = $arrUser['comment'];

$arrPost = $this->dl['postLikeTitle'];
?>


<div class="post">
  <div class="post__header">
    <div class="post__header--content">
      <h1>Bài viết</h1>
      <p>Kho bài viết được chia sẻ bởi cộng đồng</p>
    </div>
    <div class="post__btn">
      <button class="btn--success-1"><a href="Post/write">Viết bài</a></button>
    </div>
  </div>
  <div class="post__content">
    <div class="post__list">

      <?php
      
      $linkTopicDetalis = getLinkPostDetails($topic.' '.$idTopic);
      echo '
      <div class="post__list--menu">
        <h2>' . $title . '</h2>
        <div class="status">
          <div class="status-list">
            <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
            <p>' . $time . '</p>
          </div>
          <div class="status-list">
            <i class="fas fa-thumbs-up"></i>
            <p>' . $like . '</p>
            <p>lượt thích</p>
          </div>
          <div class="status-list">
            <i class="far fa-comments"></i>
            <p>' . $comment . '</p>
            <p>bình luận</p>
          </div>
          <div class="status-list">
            <i class="far fa-eye"></i>
            <p>' . $view . '</p>
            <p>lượt xem</p>
          </div>
        </div>
        <div class="status__topic">  
          <h4>Chủ đề</h4>
          <a href="Topic/details/'.$linkTopicDetalis.'">' . $topic . '</a>
        </div>
      </div>';

      ?>


      <div class="post__list--content" id="listPost">


        <div id="content-post" class="content__list">
          <?php
          echo $content;
          if(isset($_SESSION['user'])){
            echo '
          <div class="comment__report">
            <div></div>
            <div>
              <button>
                <i class="far fa-flag"></i>
                Báo cáo
              </button>
            </div>
          </div>';
          }
          ?>
        </div>

        <!-- Mở đàu bình luận -->
        <div class="content__list">
          <h3>Bình luận</h3>

          <?php
          if (isset($_SESSION['user'])) {
            echo '
          <div class="your__comment">
            <div class="your__comment-left">
              <img src="'.$_SESSION['user']['img'].'" alt="ảnh">
            </div>
            <div class="comment__wirte">
              <textarea name="" id="comment_text" cols="30" rows="10"></textarea>
              <button id="btn_comment" class="btn-disabled">
                <i class="fas fa-reply"></i>  
                Nhận xét
              </button>
            </div>
          </div>';
          } else {
            echo '
          <div class="your__comment--not">
            <p>Vui lòng <a href="Login">đăng nhập</a> để bình luận.</p>
            
          </div>
          ';
          }
          ?>

          <!-- Bắt đàu 1 bình luận -->
          <div class="post__comment" id="post_comment">

            <!-- <div class="post__comment--item">
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
            </div> -->

          </div>

          <!-- Kết thúc 1 bịnh luận -->

          <div class="post__list-page">
            <button class="next-page btn--success-1">
              Xem Thêm
            </button>
            <div class="next-page1">
              <p>Bạn đã đến cuối bình luận rồi!</p>
            </div>
            <div class="next-page2">
              <p>Bài viết này chưa có bình luận!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="post__slider">

      <!-- Mở đàu thông tin của user đăng bài viét này -->
      <?php
      echo '
      <div class="slider__user-post">
        <a href="profile/user/'.$idUserPost.'" class="user-post__header">
          <img src="'.$imgUserPost.'" alt="user">
        </a>
        <a href="profile/user/'.$idUserPost.'">'.$nameUserPost.'</a>
        <div class="user-post__info">
          <div>
            <p>bài viết</p>
            <p>'.$postUserPost.'</p>
          </div>
          <div>
            <p>Câu hỏi</p>
            <p>'.$questionUserPost.'</p>
          </div>
          <div>
            <p>Bình luận</p>
            <p>'.$commentUserPost.'</p>
          </div>
        </div>
      </div>';

      ?>
      <!--  Kết thúc thông tin user -->


      <!-- Mở đầu slider bên cạnh -->
      <div class="slider__questions">
        <div class="questions__header">
          <h3>Bài viết liên quan </h3>
        </div>
      
        <div class="questions-list">

          <!--  mở đầu 1 item câu hỏi trong list câu hỏi mới nhất -->
        <?php
      for($i = 0; $i < count($arrPost); $i++){
        $title_ = $arrPost[$i]['post_title'];
        $id_ = $arrPost[$i]['id_post'];
        $linkDetalis = getLinkPostDetails($title_.' '.$id_);
        echo '
          <a href="post/details/'.$linkDetalis.'" class="questions-list__items">
            <h3>'.$arrPost[$i]['post_title'].'</h3>
            <div class="status">
              <div class="status-list">
                <i class="fas fa-thumbs-up"></i>
                <p>'.$arrPost[$i]['slLikes'].'</p>
              </div>
              <div class="status-list">
                <i class="far fa-comments"></i>
                <p>'.$arrPost[$i]['slComment'].'</p>
              </div>
              <div class="status-list">
                <i class="far fa-eye"></i>
                <p>'.$arrPost[$i]['post_views'].'</p>
              </div>
            </div>
          </a>
          ';
      }
        ?>
          <!-- Kết thúc 1 item câu hỏi -->

        </div>
      </div>
    </div>
  </div>
</div>


<?php require_once 'Views/includes/footer.php' ?>