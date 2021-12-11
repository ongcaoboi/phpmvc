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
    function date(){
        echo time();
    }
    function insertdata($num){
        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, 'test_1_vd_hoc_lt')
        or die("Connect to database is failed");
        mysqli_query($conn, "set_names 'utf8'");
        // for($i = 0; $i<=$num; $i++){
        //     $time1 = date('Y/m/d H:i:s');
        //     $time2 = date('Y/m/d H:i:s');
        //     $sql = "INSERT INTO `question` (`id_question`, `id_user`, `question_title`, `question_conntent`, `question_date_created`, `question_views`) VALUES
        //     (NULL, 15, 'Ai giúp em bài này bằng Python được không ạ', 'Viết chương trình nhập vào 4 số nguyên a, b, x, y. Tính trung bình cộng các số chẵn trong đoạn [a, b], hoặc [b, a], tính trung bình cộng các số lẻ trong đoạn [x, y], hoặc [y, x].\r\n\r\nInput: \r\n\r\n- a, b trên cùng một dòng, cách nhau dấu cách.\r\n\r\n- x, y trên cùng một dòng, cách nhau dấu cách.\r\n\r\nVí dụ: \r\n\r\n5 12 \r\n\r\n30 -8\r\n\r\nOutput: \r\n\r\nDòng 1: Trung bình cộng các số chẵn tìm được hoặc \"NO\" nếu không tính được. \r\n\r\nDòng 1: Trung bình cộng các số lẻ tìm được hoặc \"NO\" nếu không tính được. \r\n\r\nVí dụ: \r\n\r\n30.00\r\n\r\nNO\r\n\r\nConstrains:\r\n\r\n+ các biến a, b, x, y kiểu nguyên.\r\n\r\n+ trung bình cộng có độ chính xác 2 chữ số thập phân.', '{$time1}', 0),
        //     (NULL, 14, 'Phương thức đệ quy', 'Em k hiểu cái phần code tính giai thừa này lắm :\'( các bác giúp e với \r\n \r\n<pre>\r\nusing System;\r\n\r\nnamespace Method {\r\n    class Program {\r\n        public static int Factorial(int n) {\r\n            if(n == 1) {\r\n                return 1;\r\n            }\r\n            return n * Factorial(n - 1);\r\n        }\r\n\r\n        static void Main(string[] args) {\r\n            int n = int.Parse(Console.ReadLine());\r\n            Console.WriteLine(Factorial(n));\r\n        }\r\n    }\r\n}\r\n</pre>', '{$time2}', 0)";
        //     if(mysqli_query($conn, $sql)){
        //         echo 'complete 2 rows<br>';
        //     }else{
        //         echo 'error 2 rows';
        //     }
        // }
        mysqli_close($conn);
    }
}

?>