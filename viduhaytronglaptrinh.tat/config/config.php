<?php

// định nghĩa các biến toàn cục cho csdl
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'vd_hoc_lt');
define('DOMAIN', 'http://viduhaytronglaptrinh.tat/');

// định nghĩa các hàm cần thiết cho quá trình dev
function detailArr($result){
    // hàm này dùng để in mảng ra để test kết quả
    echo "<pre?>".print_r($result)."</pre>";
    echo "<br>";
    echo "<pre?>".var_dump($result)."</pre>";
}
function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen( $chars );
    $str = '';
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }
    return $str;
}
?>
