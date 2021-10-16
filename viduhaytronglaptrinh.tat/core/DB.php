<?php 

class DB {

    protected $conn = null;
    public $result = null;

    function __construct(){
        $this->connect();
    }
    
    function connect(){
        $this->conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME)
        or die("Connect to database is failed");
        mysqli_query($this->conn, "set_names 'utf8'");
    }
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
    function fetch_assoc($sql = null, $type){
        if($this->conn){
            $query = mysqli_query($this->conn, $sql);
            if($type == 0){
                while($row = mysqli_fetch_assoc($query)){
                    $data[] = $row;
                }
                return $data;
            }
            else if($type == 1){
                return mysqli_fetch_assoc($query);
            }
        }
    }

    function disConnect(&$kq = null){
        if(!($kq == null)){
            mysqli_free_result($kq);
        }
        if($this->conn){
            mysqli_close($this->conn);
        }
    }
}
