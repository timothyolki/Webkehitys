<?php
require_once ("config/config.php");
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eSportsclips.net</title>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar">
                <span class="glyphicon glyphicon-menu-right"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><img id="logokuva" src="img/logo.png">eSportsclips.net</a></li>

                <li class="#"><a href="index.php">Home</a></li>
                <?php
                require_once ('paska.php');
                ?>

                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right" id="buttons">

                <?php

                if(!empty($_SESSION['Username'])){
                    echo '
                <li ><a href="logout.php"><button id="myBtn2"><span class="glyphicon glyphicon-log-out"></span> Logout</button></a></li>';}
                else{
                    echo '
                    
                <li><a href="#"><button id="myBtn"><span class="glyphicon glyphicon-user"></span> Login / Register</button></a></li>;
                <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->';}
                ?>
                <li id="Welcomemsg">
                    <?php

                    $Tervetuloa = 'Tervetuloa';
                    if(!empty($_SESSION['Username'])) {
                        $userUsername = $_SESSION['Username'];
                        echo "Welcome" . '&nbsp' . $userUsername;
                        echo "<a style='color:whitesmoke' href=http://users.metropolia.fi/~timool/projekti/like.php>Like our page</a>";


                        echo "<table>";
                        echo "<tr><th style='color:whitesmoke'># of likes</th></tr>";
                    }
                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            return "<td style='color:red'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }



                    try {
                        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT LIKERINO FROM LIKEPAGE");
                        $stmt->execute();

                        // set the resulting array to associative
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            if(!empty($_SESSION['Username'])) {
                                echo $v;
                            }
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                    ?>

                </li>




                </li>

            </ul>


        </div>
    </div>
</nav>