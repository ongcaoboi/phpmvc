<?php 

// class kế thừa lớp DB có chức năng truy xuất database
class QuestionModel extends DB {
    function getAllQuestions(){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về danh sách câu hỏi
            // $sql = "SELECT  `id_question` as `id`,`question_title` as `title`, `question_date_created` as `date`, `question_views` as `views`, `user_name` as `nameTK`, `user_display_name` as `displayName`, COUNT(`id`) as `slTraLoi`  from (SELECT  A.`id_question`, `question_title`, `question_date_created`, `question_views`, `user_name`, `user_display_name`, comments.`id_question` as `id`  from (SELECT question.`id_question`, `question_title`, `question_date_created`, `question_views`, userr.`user_name`, `user_display_name` FROM question, userr WHERE question.`id_user` = userr.`id_user`) as A
            // LEFT JOIN comments on A.`id_question` = comments.`id_question`) as B GROUP BY `id_question`,`question_title`, `question_date_created`, `question_views`, `user_name`, `user_display_name`";
            $sql = "CALL getListQuestion()";
            return $this->fetch_assoc($sql, 0);
        }
    }
    function getQuestion($id){
        if($this->conn){
            // thực hiện câu lệnh truy vấn trả về thông tin 1 câu hỏi
            $sql = "select *from question where id ='{$id}'";
            return $this->fetch_assoc($sql, 1);
        }
    }
        // Hàm lấy 1 câu hỏi theo id
    function isQuestion($id){
        if ($this->conn) {
        $sql = "select count('{$id}') as `sl` from question where `id_question`='{$id}'";
        return $this->fetch_assoc($sql, 1);
        }
    }
        // Hàm đếm số lượng câu hỏi của 1 user
    function getNumYourQuestion($id)
    {
        $sql = "select count(id_question) as `sl` from question where id_user ='{$id}'";
        return $this->fetch_assoc($sql, 1);
    }
    // Hàm đếm số lượng câu hỏi
  function getNumQuestion()
  {
    $sql = "select count(id_question) as `sl` from question";
    return $this->fetch_assoc($sql, 1);
  }
  // Hàm lấy phân trang bài viết
  function getPage($page, $sodong)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getListQuestionByPage($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }
  // Hàm lấy phân trang bài viết theo lượt xem
  function getPageOrderView($page, $sodong)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getListQuestionByView($vitri, $sodong)";
    return $this->fetch_assoc($sql, 0);
  }

  // Hàm lấy Thông tin của 1 câu hỏi
  function getQuestionDetails($id)
  {
    if ($this->conn) {
      $sql = "call getQuestionDetails({$id})";
      return $this->fetch_assoc($sql, 1);
    }
  } 
  // Hàm lấy phân trang câu hỏi của 1 user sắp xếp 
  function getYourQuestionPage($page, $sodong, $id)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getYourQuestionPage($vitri, $sodong, $id)";
    return $this->fetch_assoc($sql, 0);
  }
  // Hàm lấy phân trang câu hỏi của 1 user sắp xếp theo lượt xem
  function getYourQuestionView($page, $sodong, $id)
  {
    $vitri = (--$page) * $sodong;
    $sql = "call getYourQuestionView($vitri, $sodong, $id)";
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
  // Hàm lấy thông tin của người đăng bài
  function getInfoUserQuestion($id)
  {
    if ($this->conn) {
      $sql = "call getInfoUserQuestion({$id})";
      $kq = $this->fetch_assoc($sql, 1);
      $this->disConnect();
      return $kq;
    }
  }
  // Hàm lấy theo phân trang bình luận của  1 bài viết
  function getCommentInQuestion($idQuestion)
  {
    if ($this->conn) {
      $sql = "call getCommentInQuestion({$idQuestion})";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
  // Hàm đếm số lượng bình luận của 1 bài viết
  function countCommentInQuestion($id){
    if($this->conn){
      $sql = "select count(id_comment) as `sl` from comments WHERE `id_question`='{$id}'";
      $kq = $this->fetch_assoc($sql, 1);
      $this->disConnect();
      return $kq;
    }
  }
  // Hàm lấy danh sách cau hoi có tiêu đề chứa str
  function getQuestionLikeTitle($str){
    if($this->conn){
      $sql = "SELECT B.id_question, question_title, question_views, slLikes, COUNT(comments.id_question) AS slComment FROM (SELECT A.id_question, question_title, question_views, COUNT(likes.id_question) as slLikes FROM (SELECT id_question, question_title, question_views FROM question WHERE question_title LIKE N'%{$str}%' limit 0,10 ) AS A LEFT JOIN likes ON A.id_question = likes.id_question GROUP BY id_question) as B LEFT JOIN comments ON B.id_question = comments.id_question GROUP BY id_question";
      $kq = $this->fetch_assoc($sql, 0);
      $this->disConnect();
      return $kq;
    }
  }
  function comment($idQuestion, $idUser, $content){
    if($this->conn){
      $date = date('Y/m/d H:i:s');
      $sql = "INSERT INTO `comments`(`id_comment`, `id_user`, `id_post`, `id_question`, `comment_content`, `comment_date_comment`) values (NULL, 
      '{$idUser}', NULL, '{$idQuestion}', '{$content}', '{$date}')";
      $kq = $this->query($sql);
      $this->disConnect();
      return $kq;
    }
  }
  function viewQuestion($id, $view){
    if($this->conn){
      $view++;
      $sql = "UPDATE question set question_views='{$view}' where id_question='{$id}'";
      $kq = $this->query($sql);
      $this->disConnect();
      return $kq;
    }
  }
}

?>