<?php
$page_title = "Update User";
include_once "header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>View Users</a>";
echo "</div>";

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/db.php';
//include_once 'object/users.php';
 
// get database connection
//$database = new Database();
//$db = $database->getConnection();
 
// prepare product object
//$user = new Users($db);
 
// set ID property of product to be edited
//$user->id = $id;
 
// read the details of product to be edited
//$user->readOne();
/*
$query = "SELECT
                id, username, password, first_name, last_name, email
            FROM
                users
            WHERE
                id = ?
            LIMIT
                0,1";
*/
if($_POST){
 
    // instantiate product object
    include_once 'object/users.php';
    $user = new Users($db);
 
    // set product property values
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $query = "UPDATE
                users
            SET (id='$id',username='$username',first_name='$first_name',last_name='$last_name',email='$email');";
    $result = mysql_query($query,$conn) or die(mysql_error());

?>


<form action='update_users.php?id=<?php echo $id; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>ID</td>
            <td><input type='text' name='id' value='<?php echo $username; ?>' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Password</td>
            <td><input type='text' name='password' value='<?php echo $password; ?>' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>username</td>
            <td><input type='text' name='username' value='<?php echo $first_name; ?>' class='form-control' required></td>
        </tr>
 
 
        <tr>
            <td>first_name</td>
            <td><input type='text' name='first_name' value='<?php echo $last_name; ?>' class='form-control' required></td>
        </tr>
 
 		<tr>
            <td>last_name</td>
            <td><input type='text' name='last_name' value='<?php echo $email; ?>' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' value='<?php echo $user->email; ?>' class='form-control' required></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn btn-primary" value="Update">
            </td>
        </tr>
 
    </table>
</form>
?>