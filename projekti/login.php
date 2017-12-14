<?php
require_once('config/config.php');
?>
<?php

//Tänne tullaan kun ilogSign.php lomakkeella painetaan Kirjaudu painiketta
//Kayttaja/salasana kannassa?

//user oliossa kayttajatiedot jos ok, muuten false
echo "lomakkeen tiedot";
var_dump($_POST);
$user = login($_POST['email'], $_POST['pwd'], $DBH);
if ($user) {


    print_r($user);
    echo "jeee!";
}else{
    echo "user not found";
}

if(!$user){
    $_SESSION['loggausvirhe'] = 'jep';
    //Aiheuttaa alert() pääsivulla
    redirect('index.php');
} else {
    unset($_SESSION['loggausvirhe']);
    //Jos käyttäjätunnistettiin, talletetaan tiedot sessioon esim. kassalle siirtymistä
    //varten on hyvä tietää asiakastiedot
    $_SESSION['kirjautunut'] = 'yes';
	$_SESSION['Username'] = $user->USERNAME;
	$_SESSION['email'] = $user->EMAIL;
	$_SESSION['ID'] = $user->UID;
	echo "kirjautunut";
	print_r($_SESSION);
	//Jos loggaus onnistuu niin palataan paasivulle
	redirect('index.php');

}

/*
if($_SESSION['kirjautunut'] == 'yes’'){
    //Ladataan tämä (käyttäjän tiedot


}else{
    //Näytetään lomake
    include('login.php');
}
?>
Jos on kirjautunut käyttäjä, voi hänen tiedot näyttää esim. seuraavasti:
<p>Käyttäjätiedot</p>
<?php
echo '<div class="Info">';
echo 'User: '.$_SESSION['Username'];
echo '<br>';
echo('<a href="logout.php" class="button punainen">Kirjaudu ulos</a>');
echo '</div>';
*/
?>
