<?php 
class Controller {

    protected $title = "Trang chủ";

    function model($model) {
        require_once "Models/".$model.".php";
        return new $model;
    }
    function view($view) {
        require_once "Views/".$view.".php";
    }

}

?>