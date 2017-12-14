<div id="kuvanappi">
    <form method="post">
        <input id="vaihtonappi" type="submit" name="Vaihda" value="Change display photo">

    </form>

    <?php
    if (isset($_POST['Vaihda'])) {

        ?>
        <form method="post" action="upload.php" enctype='multipart/form-data'>
            <input type='file' name='file'/>
            <input id="savenappi" type='submit' value='Save img' name='but_upload'>
        </form>

        <?php

    }
    ?>
</div>
