<?php
echo '<h2>Dodaj użytkownika:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
$loged = $entityManager->find('User', $_SESSION['user']);
?>

<div class="row">
    <div class="col-lg-6">
        <b>Login:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="register_login" value=""/>
        <b>Imię i Nazwisko:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="register_name" value=""/>
        <b>Email:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="register_mail" value=""/>
        <b>Hasło:</b> <input onkeypress="app.check_key(event);" type="password" class="form-control" id="register_pass1" value=""/>
        <b>Powtórz hasło:</b> <input onkeypress="app.check_key(event);" type="password" class="form-control" id="register_pass2" value=""/>
        <b>Typ konta:</b>
        <select id="user_type" class="form-control">
            <option value="1">Klient</option>
            <?php
            if($loged->getGroupId()>2){
                echo '<option value="2">Kierownik</option>';
            }
            if($loged->getGroupId()>3){
                echo '<option value="3">Właściciel</option>';
            }
            ?>
        </select>
        <br/>
        <center><input class="btn btn-primary btn-lg" type="submit" onClick="app.register();" value="Zarejestruj"/></center>
    </div>
</div>