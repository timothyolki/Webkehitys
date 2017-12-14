<?php
require_once ("config/config.php");
//Lomakkeen syöttötiedot $data[] taulukossa
$data = $_POST['data'];
//Laitetaan syötetyt tiedot sessioon jemmaan, jotta voidaan palata muuttamaan annettuja arvoja
$_SESSION['lomakedata'] = serialize($data);

//Ovatko nimi ja email oikein? Nyt tarkistus palvelimella
if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {  //valmis php funktio

    //* on “useita”   ^  on “täytyy alkaa”
    echo '<div class="tiedot">';
    echo 'Username: '.$data['username'];
    echo '<br>';
    echo 'Sähköposti: '.$data['email'];
    echo '<br>';
    echo '</div>';
    echo '<a href="saveUser.php" class="button sininen">Tallenna</a>';
    echo '<br>';
}else {
    echo("<h3>LAITON SÄHKÖPOSTIOSOITE: <br />"
        . $data['email'] . "</h3>");

    echo '<a href="register.php" class="button punainen">Takaisin</a>';
}
?>
