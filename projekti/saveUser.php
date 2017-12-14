<?php

require_once('config/config.php');

$userdata = unserialize($_SESSION['lomakedata']);  //tekstimuodosta takaisin taulukoksi
echo "kättäjä";
print_r($userdata);
$data['email'] = $userdata['email'];
try {
    $STH = $DBH->prepare("SELECT USERS.EMAIL FROM USERS WHERE EMAIL = :email");
    $STH->execute($data);
    $row = $STH->fetch();  //Löytyiko sama email osoite?
    if ($STH->rowCount() == 0) { //Jos ei niin rekisteröidään
// lisää suola '!!'
        $userdata['password'] = md5($userdata['password'] . '!!');  //hashataan salasana suolalla

        try {
            $STH2 = $DBH->prepare("INSERT INTO USERS (USERNAME, EMAIL, PWD)
VALUES (:username, :email, :password);");
            if ($STH2->execute($userdata)) {
                try {
                    print_r($userdata);
//Jos käyttäjän tallennus onnistui asetetaan hänet loggautuneeksi
//eli kirjoitetaan käyttäjätiedot myös sessiomuuttujiin
                    $sql = "SELECT * FROM USERS WHERE UID = " . $DBH->lastInsertId() . ";";
                    $STH3 = $DBH->query($sql);
                    $STH3->setFetchMode(PDO::FETCH_OBJ);
                    $user = $STH3->fetch();
                    $_SESSION['kirjautunut'] = 'yes';
                    $_SESSION['username'] = $user->username;

                    $_SESSION['email'] = $user->email;
                    redirect('index.php');  //Palaa heti index.php sivulle
                    //print_r($_SESSION);
                } catch (PDOException $e) {
                    echo 'DB ERROR';
                    file_put_contents('log/dbERRORS.txt', 'tallennaKayttaja 3:
' . $e->getMessage() . "\n", FILE_APPEND);
                }
            }
        } catch (PDOException $e) {
            echo 'Tietojen lisäyserhe444';
            file_put_contents('log/dbERRORS.txt', 'tallennaKayttaja 2: ' . $e->getMessage() . "\n",
                FILE_APPEND);
        }
    } else {
        echo 'Username already exists!.';
    }
} catch (PDOException $e) {
    echo 'Databas error.';
    file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 1: ' . $e->getMessage() . "\n", FILE_APPEND);
} ?>
