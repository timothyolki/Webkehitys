<?php
require_once ("config/config.php");
?>



<form action="confirm.php" method="post">
    <?php
    //Halutaanko vaihtaa käyttäjätietoja - loggautunut käyttäjä
    //Käyttäjätiedot syöttövaiheessa assosiatiiviseen taulukkoon data[]  eli elementin indeksi on nimi

    if (isset($_SESSION['lomakedata'])) {  //Ollaanko muuttamassa käyttäjätietoja eli on  kirjautunut käyttäjä
        $lomakedata = unserialize($_SESSION['lomakedata']);
        ?>
        <input type="text" name="data[username]" value="<?php echo $lomakedata['username']; ?>" required><span>*</span>
        <br>
        <input type="text" name="data[email]" value="<?php echo $lomakedata['email']; ?>" required><span>*</span>
        <br>
        <?php

    } else {//Luodaan uudet käyttäjätunnukset
        ?>
        <input type="text" name="data[username]" placeholder="Username" required><span>*</span>
        <br>
        <input type="email" name="data[email]" placeholder="Email" required><span>*</span>
        <br>


        <?php
    }
    ?>

    <input type="password" name="data[password]" placeholder="Password" value="<?php echo $lomakedata['password']; ?>" required><span>*</span>
    <br>
    <input type="password" name="givenPwAgain" placeholder="Confirm password" required>
    <br>
    <input type="submit" value="save">
</form>
<script>
  const salasana = document.querySelector('input[name="data[password]"]');
  const varmistus = document.querySelector('input[name="givenPwAgain"]');
  const fillPattern = (evt) => {
    varmistus.pattern = evt.currentTarget.value;
  }
  salasana.addEventListener('keyup', fillPattern);
</script>
<!--

//-->
</script>
