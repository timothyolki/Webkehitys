<?php
require_once ('navi.php');
?>

<div class="column" id="profiili">
<div id="myModal" class="modal">
    <div class="modal-content" >
        <span class="close">&times;</span>

        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'logTab')">Login</button>
            <button class="tablinks" onclick="openTab(event, 'regTab')">Register</button>
        </div>

        <div id="logTab" class="tabcontent">
            <form action="login.php" method="post"  id="logForm">
                Email:<br>
                <input type="text" name="email"><br>
                Password:<br>
                <input type="password" name="pwd"><br>
                <input type="submit" value="submit">
            </form>

        </div>


        <div id="regTab" class="tabcontent" style="display:none;">
            <!-- <form action="confirm.php" method="post" target="_self" id="regForm">
                Username:<br>
                <input type="text" name="username"><br>
                Password:<br>
                <input type="password" name="password"><br>
                Re-type password:<br>
                <input type="password" name="password2"><br>
                E-mail address:<br>
                <input type="email" name="email"><br>
                <input type="submit" value="submit"></form> -->
            <?php
            require_once ("register.php");
            ?>

        </div>
    </div>
</div>
</div>
