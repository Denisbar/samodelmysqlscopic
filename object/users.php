<?php
//include_once '/../create_user.php';
//Was Products, now Users
class Users{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $result;
    public $query;
 
    public function __construct($db){
        $this->conn = $db;
    
    }
 
    // create product
    function create(){
 

    
        // to get time-stamp for 'created' field
        //$this->getTimestamp();
 
        //write query
        
        
        
        
 
    
    }

function readAll($page, $from_record_num, $records_per_page){
 
    $query = "SELECT
                id, username, password, first_name, last_name, email
            FROM
                " . $this->table_name . "
            ORDER BY
                id ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}

// used for paging products
public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}

    }
    //$new = new Users();
    //$new->create();


 
?>