<?php
//create_user.php
$page_title = "Create User";
include_once 'header.php';
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>View Users</a>";
echo "</div>";

// get database connection
include_once 'config/database.php';
 
$database = new Database();
$db = $database->getConnection();



?>

<?php
include_once 'config/db.php';

// if the form was submitted
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

    $query = "INSERT INTO
                    users
                VALUES ('$id', '$username','$password','$first_name','$last_name','$email');";
    $result = mysql_query($query) or die(mysql_error());
 
    // create the product
    if($result){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Product was created.";
        echo "</div>";
    }
 
    // if unable to create the product, tell the user
    else{
        //var_dump($user->create());
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to create product.";
        echo "</div>";

    }
}
?>

<!-- HTML form for creating a product -->
<form action='create_user.php' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
        
        <tr>
            <td>ID</td>
            <td><input type='text' name='id' class='form-control' required></td>
        </tr>

        <tr>
            <td>User Name</td>
            <td><input type='text' name='username' class='form-control' required></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>First Name</td>
            <td><input type='text' name='first_name' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Last Name</td>
            <td><input type='text' name='last_name' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Email</td>
            <td>
                <input type='email' name='email' class='form-control' required>
            <!-- categories from database will be here -->
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn btn-primary" value="Insert">
            </td>
        </tr>
 
    </table>
</form>

<?php
include_once 'footer.php';
?>