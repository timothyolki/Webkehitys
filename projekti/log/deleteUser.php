<?php
session_start();
require_once('config.php');
?>
<?php



if(isset($_POST['btn_delete']){
    $username = $_POST['username_delete'];
    $sql = mysql_query("DELETE FROM users WHERE username='$username'");

    if($sql){
        echo "Deleted";
    }
}
?>