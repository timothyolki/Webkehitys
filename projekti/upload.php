<?php
require_once('config/config.php');
?>




<?php

if(isset($_POST['but_upload'])){

    $name =$_FILES['file']['name'];
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES['file']['name']);

//echo ('desc'.$desc);
    $filename=($_FILES['file']['name']);
    //  echo($filename);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
    //echo 'rivi32';
    //var_dump($_SESSION);

        $param = array('URL' => $target_file);


        $kysely = $DBH->prepare("INSERT INTO IMG (IUSER,URL) VALUES (".$_SESSION['ID'].",:URL);");
        $kysely->execute($param);


        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    }

}
redirect('userpage.php')
?>