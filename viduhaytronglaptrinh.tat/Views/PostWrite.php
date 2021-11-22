<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/postWrite.css" />

<div class="post__header">
  <div class="post__header--content">
    <h1>Bài viết</h1>
    <p>Kho bài viết được chia sẻ bởi cộng đồng</p>
  </div>
  <div class="post__btn">
  </div>
</div>
<form method="POST" action="/Log" class="post__content">
  <div class="post__list--menu">
    <i></i>
    <h2>Tạo bài viết mới</h2>
  </div>
  <div class="post__content--item">
    <h3>Tiêu đề</h3>
    <input type="text" class="post_title" name="post_title" placeholder="Tên, chủ đề bài viết" maxlength="100">
  </div>
  <div class="post__content--item">
    <h3>Nội dung</h3>
    <div class="content">
      <div class="post__editor--bar">
        <button class="btn-w" tyle="button" type="button" data-element="bold">
          <i class="fa fa-bold"></i>
        </button>
        <button class="btn-w" tyle="button" type="button" data-element="1">
          <i class="fa fa-italic"></i>
        </button>
        <button class="btn-w" tyle="button" type="button" data-element="2">
          <i class="fa fa-underline"></i>
        </button>
      </div>
      <div class="post__editor--main" name="post_content" contenteditable="true">

      </div>
    </div>
  </div>
  <div class="post__content--item">
    <h3>Source code (nếu có)</h3>
    <input type="file" name="post_file">
  </div>
  <div class="post__content--item">
    <h3>Chủ đề</h3>
    <select name="post_topic" id="">
      <option value="1">lập trình C</option>
      <option value="2">Lập trình python</option>
    </select>
  </div>
  <div class="post__content--item hanhvi">
    <div></div>
    <div>
      <button type="button" id="cancer" class="btn--primary">Huỷ bỏ</button>
      <button type="submit" class="btn--success">Gửi xét duyệt</button>
    </div>
  </div>
</form>
<script src="public/js/postWrite.js"></script>
<?php require_once 'Views/includes/footer.php' ?>