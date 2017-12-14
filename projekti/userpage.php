<?php
require_once("navi.php");
?>

<div class="container">
<div class="tavarat">
<?php
if(empty($_SESSION['ID'])){

    redirect('index.php');
}

else {
    require_once('hellouser.php');
    require_once("showImage.php");
    require_once('imgButtons.php');
    require_once ('descKaikki.php');

}

?>

</div>
</div>