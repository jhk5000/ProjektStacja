<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-28
 * Time: 18:32
 */

require_once "bootstrap.php";


//require('../config.php');
//require('../functions.php');


// posiedze nad tym pozniej kurłaaaa
// trza to zintegrować na funkcje i przeniesc bezposrednio do pliku customers lub managers 
?>



<form action="createuser.php">

    <h1>Dodaj użytkownika</h1>
    <p>Proszę wypełnić pola</p>
    <hr>

    <div class="col-lg-6">
      <label for="name"><b>Login</b></label>
      <input type="text" placeholder="Enter Name" name="name" id="register_login" required>
    </div>
    <div class="col-lg-6">
      <label for="name"><b>Imie i nazwisko</b></label>
      <input type="text" placeholder="Enter Name" name="name" id="register_name" required>
    </div>
    <div class="col-lg-6">
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="register_pass1" required>
    </div>
    <div class="col-lg-6">
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="register_pass2" required>
    </div>
    <div class="col-lg-6">
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" id="register_mail" required>
    </div>
      <div class="col-lg-6">
          <b>Typ konta:</b>
          <select id="user_type" onChange="app.userTypeChange();" class="form-control">
              <option value="1">Klient</option>
              <option value="2">Manager</option>
          </select>
      </div>
    <hr>

    <button type="submit" class="registerbtn">Dodaj użytkownika</button>
  </div>


</form>

<?php

    if (!empty($_POST['name'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            echo 'Podane hasła nie są identyczne!';
        } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            echo 'Podano błędny adres email!';
        } else {
            $user = $entityManager->getRepository('User')->findOneBy(array('login' => $_POST['login']));
            $mail = $entityManager->getRepository('User')->findOneBy(array('mail' => $_POST['mail']));
            if ($user !== null) {
                echo 'Podany login jest już zajęty!';
            } elseif ($mail !== null) {
                echo 'Podany mail jest już zajęty!';
            } else {
                $password = password_hash($_POST['pass1'], PASSWORD_BCRYPT);
                $data = date("y-m-d");
                $user = new User();
                $user->setLogin($_POST['login']);
                $user->setPasswd($password);
                $user->setName($_POST['name']);
                $user->setMail($_POST['mail']);
                $user->setRegisterDate($data);
                $user->setGroupId($_POST['group']);
                //$user->setGroupId('1');
                $user->setToken('123');
                $user->setInfo('');

                $entityManager->persist($user);
                $entityManager->flush();
                echo 1;
                //wyswietelnie informacji
                echo "Created user with ID " . $user->getId() . "\n";
            }
        }
    } else {
        echo 'Uzupełnij wszystkie dane!';
    }


