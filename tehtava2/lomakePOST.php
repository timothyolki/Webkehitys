<?php echo( $_POST["etunimi"]." ".
 $_POST["sukunimi"]." ".
 $_POST["sähköpostiosoite"]." ".
 $_POST["puhelinnumero"]." ".
 $_POST["osoite"]." ".
 $_POST["postinumero"]." ".
 $_POST["salasana"]
);
/**
 * Created by PhpStorm.
 * User: markutp
 * Date: 30.10.2017
 * Time: 10.46
 */
$email = test_input($_POST["sähköpostiosoite"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Väärän tyyppinen sähköposti";
}

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["etunimi"])) {
        $nameErr = "Etunimi vaaditaan";
    }
    if (empty($_POST["sukunimi"])) {
        $nameErr = "Sukunimi vaaditaan";
    }


    if (empty($_POST["puhelinnumero"])) {
        $comment = "Puhelinnumero ei voi olla tyhjä";
    }

    if (empty($_POST["osoite"])) {
        $comment = "Osoite ei voi olla tyhjä";
    }
    if (empty($_POST["postinumero"])) {
        $comment = "Postinumero ei voi olla tyhjä";
    }
    if (empty($_POST["salasana"])) {
        $comment = "Salasana ei voi olla tyhjä";
    }
}
?>
