<?php
echo '<h2>Nasi klienci</h2><hr class="style-one"></hr>';

require_once "bootstrap.php";
$userRepository = $entityManager->getRepository('User');
$users = $usersRepository->findBy(array('group_id' => '0'));
foreach ($users as $user) {
    echo sprintf("-%s\n", $user->getName());
}


