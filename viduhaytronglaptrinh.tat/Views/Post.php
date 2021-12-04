 <?php require_once 'Views/includes/header.php' ?>
 
<link rel="stylesheet" href="public/css/post.css" />
<script src="public/js/post.js"></script>

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
      <div class="post__list--menu">
        <ul>
          <li id="post_1"><a href="Post">Bài viết</a></li>
          <li id="post_2"><a href="Topic">Chủ đề</a></li>
          <?php
          if(isset($_SESSION['user'])){
            echo '
          <li id="post_3"><a href="Post/me">Bài viết của tôi</a></li>';
          }
          ?>
        </ul>
        <div>
          <p>Sắp xếp</p>
          <select name="" id="select_page">
            <?php
              $mode = $this->dl['select'];
              if($mode =='views'){
                echo'
                <option value="news">Mới nhất</option>
                <option value="views" selected>Lượt xem</option>
                ';
              }else {
                echo '
                <option value="news" selected>Mới nhất</option>
                <option value="views">Lượt xem</option>
                ';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="post__list--content" id="listPost">

        <!-- Nội dung trang -->
        <?php 
        $arr = $this->dl['noiDung'];
        $page = $this->dl['page'];
        $soTrang = $this->dl['soTrang'];
        if($page > $soTrang){
          echo '
          <div class="content__list">
            Không có bài viết nào
          </div>';
        }else{
            for($i = 0; $i < count($arr); $i++){
            $idPost = $arr[$i]['id_post'];
            $idUser = $arr[$i]['id_user'];
            $img = $arr[$i]['user_image'] == null?'public\img\user.png':$arr[$i]['user_image'] ;
            $name = $arr[$i]['user_display_name'] == null? $arr[$i]['user_name']:$arr[$i]['user_display_name'];
            $title = $arr[$i]['post_title'];
            $idTopic = $arr[$i]['id_topic'];
            $topic = $arr[$i]['topic_name'];
            $content = substr($arr[$i]['post_content'],0,200)."...";
            $like = $arr[$i]['slLikes'];
            $comment = $arr[$i]['slComment'];
            $view = $arr[$i]['post_views'];
            $time = $arr[$i]['post_date_created'];
            $linkTopicDetalis = getLinkPostDetails($topic.' '.$idTopic);
            $linkDetalis = getLinkPostDetails($title.' '.$idPost);
          // echo $name;
        echo '
        <div class="content__list">
          <div class="media">
            <a href="profile/user/'.$idUser.'" class="media-left">
              <img src="'.$img.'" alt="ảnh">
            </a>
            <div class="media-body">
              <a href="profile/user/'.$idUser.'" class="user">
                '.$name.'
              </a>
              <a href="post/details/'.$linkDetalis.'" class="post">
                <div class="title">
                  <h3>'.$title.'</h3>
                  <a href="topic/details/'.$linkTopicDetalis.'" class="topic">'.$topic.'</a>
                </div>
                <a href="post/details/'.$linkDetalis.'"><p class="content">'.$content.'</p></a>
              </a>
              <div class="status">
                <div class="status-list">
                  <i class="fas fa-thumbs-up"></i>
                  <p>'.$like.'</p>
                </div>
                <div class="status-list">
                  <i class="far fa-comments"></i>
                  <p>'.$comment.'</p>
                </div>
                <div class="status-list">
                  <i class="far fa-eye"></i>
                  <p>'.$view.'</p>
                </div>
                <div class="status-list">
                  <img src="'.$img.'" alt="ảnh">
                  <p>'.$time.'</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        ';
        }
      }
        ?>

      </div>

      <!-- Phân trang -->
      <div class="post__list-page">
        <?php
        if($page <= $soTrang){
          if($page > 1){
            echo '
          <div class="prev-page">
            <a href="post/page/'.$mode.'/'.($page-1).'">Prev</a>
          </div>
          ';
          }else {
            echo '<div></div>';
          }
          echo '
          <div class="prev-page">
          ';
          for($i = 1; $i <= $soTrang; $i++){
            if($i == $page){
              echo '<a href="post/page/'.$mode.'/'.$page.'" class="pages-index_light">'.$page.'</a> ';
              continue;
            }
            echo '<a href="post/page/'.$mode.'/'.$i.'" class="pages-index">'.$i.'</a> ';
          }

          echo '</div>';

          if($page < $soTrang){
            echo '
          <div class="next-page">
            <a href="post/page/'.$mode.'/'.($page+1).'">Next</a>
          </div>
          ';
          }else {
            echo '<div></div>';
          }
        }
        ?>
      </div>


    </div>
<?php require_once 'Views/includes/postSlider.php' ?>
  </div>
</div>
<?php require_once 'Views/includes/footer.php' ?>