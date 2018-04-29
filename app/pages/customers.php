<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';

require_once "bootstrap.php";

//pobranie wszystkich uzytkowników z bazy i wyswietlnie ich imion i nazwisk
$userRepository = $entityManager->getRepository('user');
$users = $userRepository->findBy(array('group_id' => '1'));
$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		    <th>lp.</th>
			<th>Login</th>
			<th>Nazwa</th>
			<th>Mail</th>
			<th>Data rejestracji</th>
			<th>Akcja</th>
		  </tr>
		</thead>
		<tbody>';
    foreach ($users as $user) {
        echo sprintf('
        <tr>
            <td>'.$l. '</td>
            <td>'.$user->getLogin().'</td>
            <td>'.$user->getName().' </td>
            <td>'.$user->getMail().'</td>
            <td>'.$user->getRegisterDate().'</td>
            <td>
                <a href="'.$config['page_url'].'?page=edituser&id='.$user->getUserId().'"><input type="submit" class="btn btn-info btn-xs" value="Edytuj"/></a> 
                <a href="'.$config['page_url'].'?page=deleteuser&option=1&id='.$user->getUserId().'">
                <input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a>
            </td>
        </tr>
        ');
        $l++;
    }//end foreach

echo '</tbody></table>';
    
//foreach ($users as $user) {
//    echo "<br>";
//    echo sprintf("$l. %s \n", $user->getInfoAboutCustomer());
//        $l++;
//}


