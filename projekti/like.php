<?php
require_once ("config/config.php");

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE LIKEPAGE 
    SET LIKERINO = LIKERINO + 1";
    // use exec() because no results are returned
    $conn->exec($sql);

}

catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

<?php
redirect('index.php');

?>
