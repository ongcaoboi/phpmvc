<?php

class Controller {

    protected $title = "Trang chủ";
    protected function model($model){
        require_once "./models/".$model."Model.php";
        return new $model;
    }
    protected function view($view){
        require_once "./views/".$view."View.php";
    }
}

?>