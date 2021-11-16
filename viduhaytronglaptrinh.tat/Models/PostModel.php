<?php

// class kế thừa lớp DB có chức năng truy xuất database
class PostModel extends DB
{
  function isPost($id){
    if ($this->conn) {
      $sql = "select count('{$id}') as `sl` from post where `id_post`='{$id}'";
      return $this->fetch_assoc($sql, 1);
    }
  }
  function getNumPost()
  {
    $sql = "select count(id_post) as `sl` from post";
    return $this->fetch_assoc($sql, 1);
  }
  function getNumYourPost($id)
  {
    $sql = "select count(id_post) as `sl` from post where id_user ='{$id}'";
    return $this->fetch_assoc($sql, 1);
  }
  function getPage($page, $sodong)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getListPostByPage($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }
  function getPageOrderView($page, $sodong)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getListPostByView($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }

  function getPostDetails($id)
  {
    if ($this->conn) {
      $sql = "call getPostDetails({$id})";
      return $this->fetch_assoc($sql, 1);
    }
  }

  function getYourPostPage($page, $sodong, $id)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getYourPostPage($vitri, $sodong, $id)";
    return $this->fetch_assoc($sql, 0);
  }
  function getYourPostView($page, $sodong, $id)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getYourPostView($vitri, $sodong, $id)";
    return $this->fetch_assoc($sql, 0);
  }




  function getTopQuestion()
  {
    if ($this->conn) {
      $sql = "call getTopQuestion()";
      $a = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $a;
    }
  }
  function getTopPost()
  {
    if ($this->conn) {
      $sql = "SELECT `topic`.`id_topic`, `topic_name`, COUNT(`post`.`id_topic`) as `sl` FROM `topic` left JOIN `post` on `topic`.`id_topic` = `post`.`id_topic` GROUP by `id_topic` ORDER by `sl` DESC LIMIT 0,10";
      $a = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $a;
    }
  }

  function getInfoUserPost($id)
  {
    if ($this->conn) {
      $sql = "call getInfoUserPost({$id})";
      $kq = $this->fetch_assoc($sql, 1);
      $this->disConnect();
      return $kq;
    }
  }
  function getCommentInPost($id, $vtbd, $sodong)
  {
    if ($this->conn) {
      $sql = "call getCommentInPost({$id}, {$vtbd}, {$sodong})";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
  function countCommentInPost($id){
    if($this->conn){
      $sql = "select count(id_comment) as `sl` from comments WHERE `id_post`='{$id}'";
      $kq = $this->fetch_assoc($sql, 1);
      $this->disConnect();
      return $kq;
    }
  }
}
