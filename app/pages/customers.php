<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';

require_once "bootstrap.php";

//pobranie wszystkich uzytkowników z bazy i wyswietlnie ich imion i nazwisk
$userRepository = $entityManager->getRepository('user');
$users = $userRepository->findBy(array('group_id' => '0'));
$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		  <th>lp.</th>
			<th>Login</th>
			<th>Nazwa</th>
			<th>Mail</th>
			<th>Data rejestracji</th>
		  </tr>
		</thead>
		<tbody>';
    foreach ($users as $user) {
        echo sprintf('<tr><td>'.$l. '</td><td>'.$user->getLogin().'</td><td>'.$user->getName().' </td><td>'.$user->getMail().'</td><td>'.$user->getRegisterDate().'</td></tr>');
   $l++;
    }//end foreach

echo '</tbody></table>';
    
//foreach ($users as $user) {
//    echo "<br>";
//    echo sprintf("$l. %s \n", $user->getInfoAboutCustomer());
//        $l++;
//}


