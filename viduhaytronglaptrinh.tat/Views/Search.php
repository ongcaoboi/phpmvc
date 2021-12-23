<?php require_once 'Views/includes/header.php'?>
<link rel="stylesheet" href="public/css/post.css">
<link rel="stylesheet" href="public/css/search.css">

<div class="search">
  <div class="search__header">
    <h1>Tìm kiếm</h1>
    <p>Tìm kiếm chủ đề, bài viết, câu hỏi.</p>
  </div>
  <div class="search__body">
    <div class="search__body--input">
      <input type="text" id="keyword" value="<?php if($this->dl['key'] != null) echo $this->dl['key'] ?>" placeholder="Từ khoá">
      <button class="btn btn--success-1" onclick="search_()">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <div class="search__content">
      <div class="search-menu">
        <a id="btn__search-post" onclick="search_active(1)">Bài viết</a>
        <a id="btn__search-topic" onclick="search_active(2)">Chủ đề</a>
        <a id="btn__search-question" onclick="search_active(3)">Câu hỏi</a>
      </div>
      <div id="search-post" class="search__list">
      <?php
          $arrTopic = $this->dl['listPost'];
          if(empty($arrTopic)){
            echo '<p>Không có bài viết nào!</p>';
          }
          for($i = 0; $i < count($arrTopic); $i++){
            $id = $arrTopic[$i]['id_post'];
            $link = getLinkPostDetails($arrTopic[$i]['post_title'].' '.$id);
            echo '
        <a href="post/details/'.$link.'" class="topic-list__items">
          <p>'.$arrTopic[$i]['post_title'].'</p>
        </a><br>';  
          }
        ?>
      </div>
      <div id="search-topic" class="search__list">
      <?php
          $arrTopic = $this->dl['listTopic'];
          if(empty($arrTopic)){
            echo '<p>Không có chủ đề nào!</p>';
          }
          for($i = 0; $i < count($arrTopic); $i++){
            $id = $arrTopic[$i]['id_topic'];
            $link = getLinkPostDetails($arrTopic[$i]['topic_name'].' '.$id);
            echo '
        <a href="topic/details/'.$link.'" class="topic-list__items">
          <p>'.$arrTopic[$i]['topic_name'].'</p>
        </a><br>';  
          }
        ?>
      </div>
      <div id="search-question" class="search__list">
      <?php
          $arrTopic = $this->dl['listQuestion'];
          if(empty($arrTopic)){
            echo '<p>Không có câu hỏi nào!</p>';
          }
          for($i = 0; $i < count($arrTopic); $i++){
            $id = $arrTopic[$i]['id_question'];
            $link = getLinkPostDetails($arrTopic[$i]['question_title'].' '.$id);
            echo '
        <a href="Questions/details/'.$link.'" class="topic-list__items">
          <p>'.$arrTopic[$i]['question_title'].'</p>
        </a><br>';  
          }
        ?>
      </div>
    </div>
  </div>   
</div>
<script src="public/js/search.js"></script>

<?php
require_once 'Views/includes/footer.php' ?>