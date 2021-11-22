<?php

class Topic extends Controller{
  public $dl = [];
  function index(){
    $this->title = "Chủ đề";

    $this->dl['listQuestion'] = $this->model("PostModel")->getTopQuestion();
    $this->dl['listPost'] = $this->model("PostModel")->getTopPost();
    $arr = $this->model("TopicModel")->getAllPost();
    $arrTemp = [];
    $arrTemp[0]['id_topic'] = $arr[0]['id_topic'];
    $arrTemp[0]['topic_name'] = $arr[0]['topic_name'];
    $arrTemp[0]['post_views'] = $arr[0]['post_views'];
    $arrTemp[0]['slComment'] = $arr[0]['slComment'];
    $arrTemp[0]['slLike'] = $arr[0]['slLike'];
    $arrTemp[0]['slPost'] = 1;
    for ($i = 1; $i < count($arr); $i++) {
      $k = 0;
      for ($j = 0; $j < count($arrTemp); $j++) {
        if ($arr[$i]['id_topic'] == $arrTemp[$j]['id_topic']) {
          $k = 1;
          $arrTemp[$j]['slPost']++;
        }
      }
      if ($k == 0) {
        $index = count($arrTemp);
        $arrTemp[$index]['id_topic'] = $arr[$i]['id_topic'];
        $arrTemp[$index]['topic_name'] = $arr[$i]['topic_name'];
        $arrTemp[$index]['post_views'] = $arr[$i]['post_views'];
        $arrTemp[$index]['slComment'] = $arr[$i]['slComment'];
        $arrTemp[$index]['slLike'] = $arr[$i]['slLike'];
        $arrTemp[$index]['slPost'] = 1;
      }
    }
    for ($i = 1; $i < count($arr); $i++) {
      for ($j = 0; $j < count($arrTemp); $j++) {
        if ($arr[$i]['id_topic'] == $arrTemp[$j]['id_topic']) {
          if ($arr[$i]['post_views'] != 0) {
            $arrTemp[$j]['post_views'] += $arr[$i]['post_views'];
          }
          if ($arr[$i]['slComment'] != 0) {
            $arrTemp[$j]['slComment'] += $arr[$i]['slComment'];
          }
          if ($arr[$i]['slLike'] != 0) {
            $arrTemp[$j]['slLike'] += $arr[$i]['slLike'];
          }
        }
      }
    }
    // detailArr($arrTemp);
    // detailArr($arr);

    $this->dl['listTopic'] = $arrTemp;
    $this->view("Topic");
  }
  function details($str = null, $page = null){
    if(!is_string($str)){
        $this->view('PageError');
        die;
    }
    $this->dl['link'] = $str;
    $str = explode("-", $str);
    $idTopic = $str[count($str)-1];
    if (!is_numeric($page) || $page <= 0) {
      $page = 1;
    }
    $sodong = 10;
    $sl = $this->model("TopicModel")->countPostInTopic($idTopic);
    if ($sl['sl'] % $sodong == 0) {
      $sotrangdl = $sl['sl'] / $sodong;
    } else {
      $sotrangdl = floor($sl['sl'] / $sodong) + 1;
    }
    $vitri = (--$page) * $sodong;
    $this->dl['listQuestion'] = $this->model("PostModel")->getTopQuestion();
    $this->dl['listPost'] = $this->model("PostModel")->getTopPost();
    if($page > $sotrangdl){
      $this->view('PageError');
      die;
    }else{
      $kq = $this->model("TopicModel")->getPostInTopic($idTopic, $vitri, $sodong);
    }
    $this->title = $kq[0]['topic_name'];
    $this->dl['title'] = $kq[0]['topic_name'];
    $this->dl['noiDung'] = $kq;
    $this->dl['page'] = $page+1;
    $this->dl['soTrang'] = $sotrangdl;
    
    // detailArr($this->dl);

    $this->view('TopicDetails');
  }
}
