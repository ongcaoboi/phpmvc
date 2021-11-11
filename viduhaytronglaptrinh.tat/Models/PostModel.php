<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class PostModel extends DB {

  function getNumPost(){
    $sql = "select count(id_post) as `sl` from post";
    return $this->fetch_assoc($sql, 1);
  }
  function getNumYourPost($id){
    $sql = "select count(id_post) as `sl` from post where id_user ='{$id}'";
    return $this->fetch_assoc($sql, 1);
  }
  function getPage($page, $sodong){
    $vitri = (--$page)*$sodong;
    $sql = "call getListPostByPage($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }
  function getPageOrderView($page, $sodong){
    $vitri = (--$page)*$sodong;
    $sql = "call getListPostByView($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }
  function getTopQuestion(){
      if($this->conn){
          $sql = "call getTopQuestion()";
          $a = $this->fetch_assoc($sql, 0);
          $this->disConnect();
          return $a;
      }
  }
  function getTopPost(){
      if($this->conn){
          $sql = "SELECT `topic`.`id_topic`, `topic_name`, COUNT(`post`.`id_topic`) as `sl` FROM `topic` left JOIN `post` on `topic`.`id_topic` = `post`.`id_topic` GROUP by `id_topic` ORDER by `sl` DESC LIMIT 0,10";
          $a = $this->fetch_assoc($sql, 0);
          $this->disConnect();
          return $a;
      }
      
  }
  
  function getYourPostPage($page, $sodong, $id){
    $vitri = (--$page)*$sodong;
    $sql = "call getYourPostPage($vitri, $sodong, $id)";
    return $this->fetch_assoc($sql, 0);
  }
  function getYourPostView($page, $sodong, $id){
    $vitri = (--$page)*$sodong;
    $sql = "call getYourPostView($vitri, $sodong, $id)";
    return $this->fetch_assoc($sql, 0);
  }
}

?>