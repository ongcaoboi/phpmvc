<?php

// định nghĩa các biến toàn cục cho csdl
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'test_1_vd_hoc_lt');
define('DOMAIN', 'http://viduhaytronglaptrinh.tat/');

// định nghĩa các hàm cần thiết cho quá trình dev
function detailArr($result){
    // hàm này dùng để in mảng ra để test kết quả
    echo "Thông tin cơ bản của mảng<br>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    echo "<br> Thông tin chi tiết của mảng";
    echo "<br>";
    echo "<pre>".var_dump($result)."</pre>";
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
