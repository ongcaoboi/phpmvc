<?php

// định nghĩa các biến toàn cục cho csdl
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'vd_hoc_lt');

// định nghĩa các hàm cần thiết cho quá trình dev
function detailArr($result){
    // hàm này dùng để in mảng ra để test kết quả
    echo "<pre?>".var_dump($result)."</pre>";
}
?>