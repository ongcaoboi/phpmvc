<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/post.css" />
<link rel="stylesheet" href="public/css/Topic.css" />
<?php 


?>


<div class="post">
  <div class="post__header">
    <div class="post__header--content">
      <h1>Chủ đề</h1>
      <p>Danh sách chủ đề được cộng đồng tạo ra</p>
    </div>
    <div class="post__btn">
      <button class="btn--success-1 btn__create-topic">Tạo chủ đề</button>
    </div>
  </div>
  <div class="post__content">
    <div class="post__list">
      <div class="post__list--menu">
        <h3>Chủ đề</h3>
      </div>
<?php 
  $arrTopic = $this->dl['listTopic'];
  for ($i=0; $i < count($arrTopic) ; $i++) { 
    $idTopic_ = $arrTopic[$i]['id_topic']; 
    $topicName_ = $arrTopic[$i]['topic_name']; 
    $postViews_ = $arrTopic[$i]['post_views']; 
    $slComment_ = $arrTopic[$i]['slComment']; 
    $slLike_ = $arrTopic[$i]['slLike']; 
    $slPost_ = $arrTopic[$i]['slPost'];
    $linkDetalis = getLinkPostDetails($topicName_.' '.$idTopic_);
    echo '
      <div class="post__list--content" id="listPost">
        <div class="content__list">
          <div class="media">
            <div class="media-body">
              <a href="Topic/details/'.$linkDetalis.'" class="post">
                <div class="title">
                  <h3>'.$topicName_.'</h3>
                </div>
              </a>
              <div class="status">
                <div class="status-list">
                  <p>Tổng số bài viết</p>
                  <p>'.$slPost_.'</p>
                </div>
                <div class="status-list">
                  <i class="fas fa-thumbs-up"></i>
                  <p>'.$slLike_.'</p>
                </div>
                <div class="status-list">
                  <i class="far fa-comments"></i>
                  <p>'.$slComment_.'</p>
                </div>
                <div class="status-list">
                  <i class="far fa-eye"></i>
                  <p>'.$slLike_.'</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      ';
  }
?>
      <!-- Phân trang -->


    </div>
<?php require_once 'Views/includes/postSlider.php' ?>
  </div>
</div>

<?php require_once 'Views/includes/footer.php' ?>