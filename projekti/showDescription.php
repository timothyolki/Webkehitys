<?php
require_once ('config/config.php');


$Kayttaja=$_SESSION['ID'];
$kysely = $DBH->prepare("SELECT DESCRIPTION FROM USERS WHERE UID= $Kayttaja");


$kysely->execute();
//kuvia varten kansio!

$rivi = $kysely->fetch() ;
$s = $rivi["DESCRIPTION"];


echo $s;

?>