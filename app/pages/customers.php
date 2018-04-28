<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';

require_once "bootstrap.php";

//pobranie wszystkich uzytkowników z bazy i wyswietlnie ich imion i nazwisk
$userRepository = $entityManager->getRepository('User');
$users = $userRepository->findBy(array('group_id' => '0'));
foreach ($users as $user) {
    echo sprintf("-%s\n", $user->getName());
}


