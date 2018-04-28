<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-28
 * Time: 18:32
 */

require_once "bootstrap.php";

//wartosci wprowadzane przy dodawaniu uzytkownia
$newUserLogin = $argv[1];
$newUserPasswd = $argv[2];


//wtworzenie nowego uzytkownika
$user = new User();

// ustawienie wartosci pol na pobrane wyzej wartosci
$user->setLogin($newUserLogin);
$user->setPasswd($newUserPasswd);
$user->setGroupId($newUserGroupId);
$user->setName($newUserName);
$user->setMail($newUserMail);
$user->setInfo($newUserInfo);

//dodanie do bazy i zatwierdzenie
$entityManager->persist($user);
$entityManager->flush();

//wyswietelnie informacji
echo "Created user with ID " . $user->getId() . "\n";