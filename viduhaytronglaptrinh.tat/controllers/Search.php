<?php
class Search extends Controller {
  public $dl = [];
  function index($dl = null){
    if($dl == null)
      $dl = '';
    // detailArr($_POST['q']);
    $this->dl['listQuestion'] = $this->model("SearchModel")->SearchQuestion($dl);
    $this->dl['listPost'] = $this->model("SearchModel")->SearchPost($dl);
    $this->dl['listTopic'] = $this->model("SearchModel")->SearchTopic($dl);
    $this->dl['key'] = $dl;

    $this->title = "Kết quả tìm kiếm";
    $this->view("Search");
  }
}
?>