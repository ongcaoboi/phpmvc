<?php 

class DB {

    protected $conn = null;
    public $result = null;

    // Hàm khởi tạo
    function __construct(){
        $this->connect();
    }
    // Hàm kết nối tới csdl
    function connect(){
        $this->conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME)
        or die("Connect to database is failed");
        mysqli_query($this->conn, "set_names 'utf8'");
    }
    // hàm thực hiện truy vẫn : hình như hàm này k trả về dc kết quả
    function query($sql = null){
        if($this->conn) {
            return mysqli_query($this->conn, $sql);
        }
    }
    // function fetch_assoc($sql = null, $type){
    //     if($this->conn) {
    //         mysqli_query($this->conn, $sql);
    //     }
    // }
    // hàm thực hiện truy vấn trả về kết quả: 1 kết quả hoặc 1 mảng kết quả
    function fetch_assoc($sql = null, $type){
        if($this->conn){
            $query = mysqli_query($this->conn, $sql);
            if($type == 0){
                // néu $type = 0 thì trả vê mảng kết quả
                while($row = mysqli_fetch_assoc($query)){
                    $data[] = $row;
                }
                return $data;
            }
            // còn = 1 thì trả về 1 kết quả
            else if($type == 1){
                return mysqli_fetch_assoc($query);
            }
        }
    }
    // hàm đóng kết nối
    function disConnect(){
        if($this->conn){
            mysqli_close($this->conn);
        }
    }
}
