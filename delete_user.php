<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'object/user.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $u = new Users($db);
 
    // set product id to be deleted
    $u->id = $_POST['object_id'];
 
    // delete the product
    if($u->delete()){
        echo "Object was deleted.";
    }
 
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
 
    }
}
?>