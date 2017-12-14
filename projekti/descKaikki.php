<?php
require_once ('config/config.php')
?>

<div id="descr">
<form method="post">
    <input id="descnappi" type="submit" name="Update" value="Update 'about me'"><br>
<textarea  name="textfield" rows="5" cols="50">

    <?php
    if(isset($_POST['Update'])){
        require_once ('description.php');

    }
    else {
        require_once('showDescription.php');



    }
    ?>
</textarea>
</div>