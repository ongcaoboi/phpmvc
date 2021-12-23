<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class SearchModel extends DB {
  function SearchPost($keyword){
    if($this->conn){
      $sql = "select * from post where post_title like N'%{$keyword}%'";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
  function SearchTopic($keyword){
    if($this->conn){
      $sql = "select * from Topic where topic_name like N'%{$keyword}%'";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
  function SearchQuestion($keyword){
    if($this->conn){
      $sql = "select * from Question where question_title like N'%{$keyword}%'";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
}

?>