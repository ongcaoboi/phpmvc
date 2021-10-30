<?php

class Log extends Controller {
    function index() {
        echo "<pre>";
        echo print_r($GLOBALS);
        echo "</pre>";
        echo '<br>----------------------';
        echo "<pre>";
        echo var_dump($GLOBALS);
        echo "</pre>";

    }
    function removeSession(){
        session_destroy();
    }
    function time(){
        echo date('Y/m/d H:i:s');
    }
    function md5($param){
        echo md5($param);
    }
    function set(){

        $expire = time()+60*2;
        $arr = array(
            'id' => 'id',
            'name' => 'name',
            'img' => 'img',
        );
        $a = json_encode($arr);
        setcookie('cookie_account',$a,$expire, '/');
    }
    function read(){
        if(isset($_COOKIE['cookie_account'])){
            echo detailArr($_COOKIE);
        }
        else{
            echo '123<br>';
            echo detailArr($_COOKIE);

        }
    }
}

?>