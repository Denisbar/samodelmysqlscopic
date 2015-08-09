<?php
//database.php

class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "scopic";
    private $username = "root";
    private $password = "8169x5it";
    public $mysql_conn;
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        
        $this->mysql_conn = mysql_connect($this->host, $this->username, $this->password);
        if(!$this->mysql_conn) {
            die('No connection:' . mysql_error());
        }else{
            echo "Connection Seccessfull";
        }

        $this->conn = mysql_select_db($this->db_name, $this->mysql_conn) or die(mysql_error());
        
        return $this->conn;
    }
}
?>