<?php
require_once('config/config.php');
//SSLon();
session_unset();
session_destroy();
//var_dump($_SESSION);
redirect('index.php')
?>



