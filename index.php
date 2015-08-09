<?php
// include database and object files
include_once 'config/db.php';
//include_once 'config/database.php';
//include_once 'object/users.php';
$page_title = "View Users";
include_once "header.php";
// paging buttons here


echo "<div class='right-button-margin'>";
    echo "<a href='create_user.php' class='btn btn-default pull-right'>Create User</a>";
echo "</div>";


// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 10;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

/*
$query = "SELECT
                id, username, password, first_name, last_name, email
            FROM
                users
            ORDER BY
                id ASC
            LIMIT
                5, 10;";
 
 $result = mysql_query($query) or die(mysql_error());
*/
 $q = "SELECT id, username, password, first_name, last_name, email FROM users ORDER BY id;";
 $r = mysql_query($q) or die(mysql_error());
 $num = mysql_num_rows($r);
 var_dump($num);
/*
 $a = "SELECT id FROM users;";
 $b = mysql_query($a) or die(mysql_error());
 $c = mysql_num_rows($b);
 */
// instantiate database and product object
/*$database = new Database();
$db = $database->getConnection();
 
$product = new Users($db);
 
// query products
$stmt = $product->readAll($page, $from_record_num, $records_per_page);
$num = $stmt->rowCount();
*/ 
// display the products if there are any
if($num>0){
 
    //$category = new Category($db);
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>User Name</th>";
            echo "<th>Password</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
        echo "</tr>";
 
        while ($row = mysql_fetch_assoc($r)){
 
            //extract($row);
 
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>";
                    
                echo "</td>";
 
                echo "<td>";
                    // edit and delete button will be here
                echo "<a href='update_users.php?id={$row['id']}' class='btn btn-default left-margin'>Edit</a>";
    echo "<a delete-id='{$row['id']}' class='btn btn-default delete-object'>Delete</a>";
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
    // paging buttons will be here
}
 
// tell the user there are no Users
else{
    echo "<div>No users found.</div>";
}


echo "<td>";
    // edit and delete button is here
    echo "<a href='update_users.php?id={$row['id']}' class='btn btn-default left-margin'>Edit</a>";
    echo "<a delete-id='{$row['id']}' class='btn btn-default delete-object'>Delete</a>";
echo "</td>";
include_once 'paging_users.php';
//include_once 'test.php';
?>

<script>
$(document).on('click', '.delete-object', function(){
 
    var id = $(this).attr('delete-id');
    var q = confirm("Are you sure?");
 
    if (q == true){
 
        $.post('delete_user.php', {
            object_id: id
        }, function(data){
            location.reload();
        }).fail(function() {
            alert('Unable to delete.');
        });
 
    }
 
    return false;
});
</script>
<?php
include_once "footer.php";
?>	