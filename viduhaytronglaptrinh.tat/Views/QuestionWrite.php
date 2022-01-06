<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/questionWrite.css" />
<script src="public/ckeditor/ckeditor.js"></script>

<div class="question__header">
  <div class="question__header--content">
    <h1>Hỏi Đáp</h1>
    <p>Chia sẻ kiến thức , cùng nhau phát triển</p>
  </div>
  <div class="question__btn">
  </div>
</div>
<form method="POST" action="" role="form" class="question__content">
  <div class="question__list--menu">
    <i></i>
    <h2>Đặt câu hỏi</h2>
  </div>
  <div class="question__content--item">
    <h3>Tiêu đề</h3>
    <input type="text" class="question_title" name="question_title" id="question_title" placeholder="Tên, chủ đề câu hỏi" maxlength="100">
  </div>
  <div class="question__content--item">
    <h3>Nội dung</h3>
    <div class="content">
        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
    </div>
  </div>
  <div class="post__content--item hanhvi">
    <div></div>
    <div>
      <button type="button" id="cancer" class="btn--primary">Huỷ bỏ</button>
      <button type="button" class="btn--success" id="submit">Đặt câu hỏi</button>
    </div>
  </div>
</form>
<script src="public/js/questionWrite.js"></script>
<?php require_once 'Views/includes/footer.php' ?>