<?php echo( $_GET["etunimi"]." ".
    $_GET["sukunimi"]." ".
    $_GET["sähköpostiosoite"]." ".
    $_GET["puhelinnumero"]." ".
    $_GET["osoite"]." ".
    $_GET["postinumero"]." ".
    $_GET["salasana"]
);
/**
 * Created by PhpStorm.
 * User: markutp
 * Date: 30.10.2017
 * Time: 10.46
 */
$email = test_input($_GET["sähköpostiosoite"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Väärän tyyppinen sähköposti";
}

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_GET["etunimi"])) {
        $nameErr = "Etunimi vaaditaan";
    }
    if (empty($_GET["sukunimi"])) {
        $nameErr = "Sukunimi vaaditaan";
    }


    if (empty($_GET["puhelinnumero"])) {
        $comment = "Puhelinnumero ei voi olla tyhjä";
    }

    if (empty($_GET["osoite"])) {
        $comment = "Osoite ei voi olla tyhjä";
    }
    if (empty($_GET["postinumero"])) {
        $comment = "Postinumero ei voi olla tyhjä";
    }
    if (empty($_GET["salasana"])) {
        $comment = "Salasana ei voi olla tyhjä";
    }
}