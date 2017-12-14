<?php
require_once ('config/config.php');
?>

<?php
$kysely = $DBH->prepare("SELECT * FROM IMG WHERE IUSER=".$_SESSION['ID']." ORDER BY PVM DESC" ) ;


$kysely->execute();
//kuvia varten kansio!

 $rivi = $kysely->fetch() ;
    $s = $rivi["URL"];


    echo "<img src='$s' alt='showimage' height='200' width='300'>";
?>


