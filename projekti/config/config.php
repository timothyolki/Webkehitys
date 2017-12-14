<?php
session_save_path('/home1-2/t/timool/public_html/projekti/session');
session_start();

$user = 'timool';        //Käytäjänimi
$pass = 'whiteamerica91';        //Salasana, ei OMAn vaan phpAdminin
$host = 'mysql.metropolia.fi';  //Tietokantapalvelin
$dbname = 'timool';        //Tietokanta
// Muodostetaan yhteys tietokantaan
try {     //Avataan yhteys tietokantaan ($DBH on nyt luotu yhteysolio, nimi vapaasti valittavissa)
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
// virheenkäsittely: virheet aiheuttavat poikkeuksen
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// käytetään  merkistöä utf8
    $DBH->exec("SET NAMES utf8;");
} catch (PDOException $e) {
    echo "Yhteysvirhe.";
//Kirjoitetaan mahdollinen virheviesti tiedostoon
    file_put_contents('log/DBErrors', 'Connection: ' . $e->getMessage() . "\n", FILE_APPEND);
} //HUOM hakemistopolku!


function login($user, $pwd, $DBH)
{
// !! on suola, jotta kantaan taltioitu eri hashkoodi vaikka salasana olisi tiedossa
//kokeile !! ja ilman http://www.danstools.com/md5-hash-generator/
//Tukevampia salauksia hash('sha256', $pwd ) tai hash('sha512', $pwd )
//MD5 on 128 bittinen
    $hashpwd = hash('md5', $pwd . '!!'); //HUOM Suola
//An array of values with as many elements as there are bound parameters in the
//SQL statement being executed. All values are treated as PDO::PARAM_STR
    $data = array('sposti' => $user, 'PWD' => $hashpwd);
//print_r($data);
    try {
//var_dump($data);
//echo "Login 1<br />";
        $STH = $DBH->prepare("SELECT * FROM USERS WHERE EMAIL=:sposti AND
PWD = :PWD");
//HUOM! SQL-lauseessa on monta muuttuvaa) tietoa. Ne on helppo antaa
// assosiatiivisen taulukon avulla (eli indeksit merkkijonoja)
//HUOM! Taulukko annetaan nyt execute() metodille
        $STH->execute($data);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $row = $STH->fetch();
//echo "hakutulos";
        print_r($row);
        if ($STH->rowCount() > 0) {
//echo "Login 4<br />";
            return $row;
        } else {
//echo "Login 5<br />";
            return false;
        }
    } catch (PDOException $e) {
        echo "Login DB error.";
        file_put_contents('log/dbErrors.txt', 'Login: ' . $e->getMessage() . "\n", FILE_APPEND);
    }
}
function redirect($url){
    if (!headers_sent()){	//If headers not sent yet... then do php redirect
        header('Location: '.$url); exit;
    }else{                	//If headers are sent... do java redirect... if java disabled, do html redirect.
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}//==== End -- Redirect


//==== Turn on HTTPS - Detect if HTTPS, if not on, then turn on HTTPS:
function SSLon(){
    if($_SERVER['HTTPS'] != 'on'){
        $url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        redirect($url);
    }
}//==== End -- Turn On HTTPS


//==== Turn Off HTTPS -- Detect if HTTPS, if so, then turn off HTTPS:
function SSLoff(){
    if($_SERVER['HTTPS'] == 'on'){
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        redirect($url);
    }
}//==== End -- Turn Off HTTPS



?>



