<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/postWrite.css" />
<script src="public/ckeditor/ckeditor.js"></script>

<div class="post__header">
  <div class="post__header--content">
    <h1>Bài viết</h1>
    <p>Kho bài viết được chia sẻ bởi cộng đồng</p>
  </div>
  <div class="post__btn">
  </div>
</div>
<form method="POST" action="" role="form" class="post__content">
  <div class="post__list--menu">
    <i></i>
    <h2>Tạo bài viết mới</h2>
  </div>
  <div class="post__content--item">
    <h3>Tiêu đề</h3>
    <input type="text" class="post_title" name="post_title" id="post_title" placeholder="Tên, chủ đề bài viết" maxlength="100">
  </div>
  <div class="post__content--item">
    <h3>Nội dung</h3>
    <div class="content">
        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
    </div>
  </div>
  <div class="post__content--item">
    <h3>Source code (nếu có)</h3>
    <input type="file" id="file" name="file">
  </div>
  <div class="post__content--item">
    <h3>Chủ đề</h3>
    <select name="post_topic" id="topic">
      <?php
        $arrTopic = $this->dl['listTopic'];
        for($i = 0; $i<count($arrTopic); $i++){
          $value = $arrTopic[$i]['id_topic'];
          $name = $arrTopic[$i]['topic_name'];
          echo '
      <option value="'.$value.'">'.$name.'</option>
      ';
        }
      ?>
    </select>
  </div>
  <div class="post__content--item hanhvi">
    <div></div>
    <div>
      <button type="button" id="cancer" class="btn--primary">Huỷ bỏ</button>
      <button type="button" class="btn--success" id="submit">Tạo bài viết</button>
    </div>
  </div>
</form>
<script src="public/js/postWrite.js"></script>
<?php require_once 'Views/includes/footer.php' ?>