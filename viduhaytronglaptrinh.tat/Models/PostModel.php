<?php

// class kế thừa lớp DB có chức năng truy xuất database
class PostModel extends DB
{
  // Hàm lấy 1 bài viết theo id
  function isPost($id){
    if ($this->conn) {
      $sql = "select count('{$id}') as `sl` from post where `id_post`='{$id}'";
      return $this->fetch_assoc($sql, 1);
    }
  }
  // Hàm đếm số lượng bài viết
  function getNumPost()
  {
    $sql = "select count(id_post) as `sl` from post";
    return $this->fetch_assoc($sql, 1);
  }
  // Hàm đếm số lượng bài viết của 1 user
  function getNumYourPost($id)
  {
    $sql = "select count(id_post) as `sl` from post where id_user ='{$id}'";
    return $this->fetch_assoc($sql, 1);
  }
  // Hàm lấy phân trang bài viết
  function getPage($page, $sodong)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getListPostByPage($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }
  // Hàm lấy phân trang bài viết theo lượt xem
  function getPageOrderView($page, $sodong)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getListPostByView($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }
  // Hàm lấy Thông tin của 1 bài viết
  function getPostDetails($id)
  {
    if ($this->conn) {
      $sql = "call getPostDetails({$id})";
      return $this->fetch_assoc($sql, 1);
    }
  } 
  // Hàm lấy phân trang bài viết của 1 user sắp xếp 
  function getYourPostPage($page, $sodong, $id)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getYourPostPage($vitri, $sodong, $id)";
    return $this->fetch_assoc($sql, 0);
  }
  // Hàm lấy phân trang bài viết của 1 user sắp xếp theo lượt xem
  function getYourPostView($page, $sodong, $id)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getYourPostView($vitri, $sodong, $id)";
    return $this->fetch_assoc($sql, 0);
  }
  // Hàm lấy top 10 câu hỏi mới nhất
  function getTopQuestion()
  {
    if ($this->conn) {
      $sql = "call getTopQuestion()";
      $a = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $a;
    }
  }
  // Hàm lấy Top 10 chủ đề nổi bật nhất mới nhất
  function getTopTopic()
  {
    if ($this->conn) {
      $sql = "SELECT `topic`.`id_topic`, `topic_name`, COUNT(`post`.`id_topic`) as `sl` FROM `topic` left JOIN `post` on `topic`.`id_topic` = `post`.`id_topic` GROUP by `id_topic` ORDER by `sl` DESC LIMIT 0,10";
      $a = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $a;
    }
  }
  function getTopPost(){
    if ($this->conn) {
      $sql = "call getTopPost()";
      $a = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $a;
    }
  }
  // Hàm lấy thông tin của người đăng bài viết
  function getInfoUserPost($id)
  {
    if ($this->conn) {
      $sql = "call getInfoUserPost({$id})";
      $kq = $this->fetch_assoc($sql, 1);
      $this->disConnect();
      return $kq;
    }
  }
  // Hàm lấy theo phân trang bình luận của  1 bài viết
  function getCommentInPost($id, $vtbd, $sodong)
  {
    if ($this->conn) {
      $sql = "call getCommentInPost({$id}, {$vtbd}, {$sodong})";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
  // Hàm đếm số lượng bình luận của 1 bài viết
  function countCommentInPost($id){
    if($this->conn){
      $sql = "select count(id_comment) as `sl` from comments WHERE `id_post`='{$id}'";
      $kq = $this->fetch_assoc($sql, 1);
      $this->disConnect();
      return $kq;
    }
  }
  // Hàm lấy danh sách bình luận của 1 bài viết
  function comment($idPost, $idUser, $content){
    if($this->conn){
      $date = date('Y/m/d H:i:s');
      $sql = "INSERT INTO `comments`(`id_comment`, `id_user`, `id_post`, `id_question`, `comment_content`, `comment_date_comment`) values (NULL, 
      '{$idUser}', '{$idPost}', NULL, '{$content}', '{$date}')";
      $kq = $this->query($sql);
      $this->disConnect();
      return $kq;
    }
  }
  // Hàm lấy danh sách bài viết có tiêu đề chứa str
  function getPostLikeTitle($str){
    if($this->conn){
      $sql = "select `id_post`, `post_title`, `post_views` , topic.`id_topic`, `topic_name`, `slComment`, `slLikes` from (select `id_post`, `id_topic`, `post_title`, `post_views`, `slComment`, COUNT(`id`) as `slLikes` from (select C.`id_post`, `id_topic`, `post_title`, `post_views` , `slComment`, likes.`id_post` as `id` from (select `id_post`, `id_topic`, `post_title`, `post_views` , COUNT(`id`) as `slComment` from (select  A.`id_post`, `id_topic`, `post_title`, `post_views` , comments.`id_post` as `id` from (select `id_post`, `id_topic`, `post_title`, `post_views` FROM post WHERE `post_title` like N'%{$str}%' limit 0,10) as A LEFT JOIN comments on A.`id_post` = comments.`id_post`) as B GROUP BY `id_post`) as C LEFT JOIN likes on C.`id_post` = likes.`id_post`) as D GROUP BY `id_post`) as E, topic WHERE E.`id_topic` = topic.`id_topic`";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
}
