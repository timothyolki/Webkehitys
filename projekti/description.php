<?php
require_once ('config/config.php');
?>


<?php
//$description=$_POST['description'];
$text=$_POST['textfield'];
echo $text;
$Kayttaja = $_SESSION['ID'];

  $STH= $DBH->prepare("UPDATE USERS SET DESCRIPTION = '$text'  WHERE UID = $Kayttaja");

  $STH->execute();



//redirect('userpage.php');
?>

