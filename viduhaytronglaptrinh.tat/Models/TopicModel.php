<?php

class TopicModel extends DB {
  function getAllPost(){
    if($this->conn){
      $sql = "SELECT C.`id_topic`, `topic_name`, `post_views` , `slComment`, `slLike` FROM (select `id_topic`, `post_views` , COUNT(`id`) as `slComment`, COUNT(`id_like`) as `slLike` from (select D.`id_post`, `id_topic`, `post_views` , `id`, `id_like` FROM (select  A.`id_post`, `id_topic`, `post_views` , comments.`id_post` as `id` from (select `id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views` FROM post) as A LEFT JOIN comments on A.`id_post` = comments.`id_post`) as D LEFT JOIN likes on D.`id_post` = likes.`id_post`) as B GROUP BY `id_post`) as C LEFT JOIN topic on C.`id_topic` = topic.`id_topic`";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
  function countPostInTopic($id){
    if($this->conn){
      $sql = "select count(`id_post`) as sl from post where `id_topic` = '{$id}'";
      $kq = $this->fetch_assoc($sql, 1);
      $this->disConnect();
      return $kq;
    }
  }
  function getPostInTopic($id, $vtbd, $sodong){
    if($this->conn){
      $sql = "select * from (select `id_post`, `post_title`, `post_content`, `post_date_created`, `post_views`, `id_user`, `user_name`, `user_display_name`, `user_image` , topic.`id_topic`, `topic_name`, `slComment`, `slLikes` from (select `id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, `id_user`, `user_name`, `user_display_name`, `user_image` , `slComment`, COUNT(`id`) as `slLikes` from (select C.`id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, C.`id_user`, `user_name`, `user_display_name`, `user_image` , `slComment`, likes.`id_post` as `id` from (select `id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, `id_user`, `user_name`, `user_display_name`, `user_image` , COUNT(`id`) as `slComment` from (select  A.`id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, A.`id_user`, `user_name`, `user_display_name`, `user_image` , comments.`id_post` as `id` from (select `id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, post.`id_user`, `user_name`, `user_display_name`, `user_image` FROM post, userr WHERE post.`id_user` = userr.`id_user` and `id_topic` = {$id}) as A LEFT JOIN comments on A.`id_post` = comments.`id_post`) as B GROUP BY `id_post`) as C LEFT JOIN likes on C.`id_post` = likes.`id_post`) as D GROUP BY `id_post`) as E, topic WHERE E.`id_topic` = topic.`id_topic` ORDER By `id_post` DESC)as F LIMIT {$vtbd},{$sodong}";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
}

?>