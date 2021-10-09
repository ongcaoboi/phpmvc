<?php

class App {

    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];
    function __construct()
    {
        $arrUrl = $this->getUrlProcess();

        if(isset($arrUrl[0])){
            if(file_exists("./Controllers/".$arrUrl[0]."Controller.php")){
                $this->controller = $arrUrl[0]."Controller";
                unset($arrUrl[0]);
            }
        }
        require_once "./controllers/".$this->controller.".php";
        $this->controller = new $this->controller;

        if(isset($arrUrl[1])){
            if(method_exists($this->controller, $arrUrl[1])){
                $this->action = $arrUrl[1];
                unset($arrUrl[1]);
            }
        }

        $this->params = $arrUrl?array_values($arrUrl):[];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    
    private function getUrlProcess(){
        if(isset($_GET['url'])){
            return explode("/",filter_var(trim($_GET['url'],"/")));
        }
    }
}
?>