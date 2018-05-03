<?php
echo '<h2>Kierownicy</h2><hr class="style-one"></hr>';
echo '<a href="'.$config['page_url'].'?page=register"><input type="submit" class="btn btn-primary" value="Dodaj kierownika"/></a><br>';
require_once "bootstrap.php";

$userRepository = $entityManager->getRepository('User');
$managers = $userRepository->findBy(array('group_id' => '2'));

$query = $entityManager->createQuery("SELECT u.login, u.name, u.mail, u.register_date, s.station_name, s.city, s.street, s.voivodeship, u.user_id, s.station_id, m.manager_id, m.Users_user_id, m.Stations_station_id FROM User u, Stations s, Managers m where u.user_id = m.Users_user_id AND m.Stations_station_id = s.station_id AND u.group_id = 2");
$results = $query->getResult();
$query1 = $entityManager->createQuery("SELECT u.login, u.name, u.mail, u.register_date, u.user_id FROM User u WHERE u.user_id NOT IN (SELECT m.Users_user_id FROM Managers m) AND u.group_id = 2");
$results1 = $query1->getResult();
$l=1;
	echo '<br><table class="table table-bordered table-hover">
			<thead>
			  <tr>
				<th width="5%">lp.</th>
                <th width="15%">Login</th>
                <th width="15%">Nazwa</th>
                <th width="15%">Mail</th>
                <th width="15%">Data rejestracji</th>
                <th width="15%">Stacja</th>
                <th width="15%">Miejscowość</th>
                <th width="5%">Akcja</th>
			  </tr>
			</thead>
			<tbody>';

foreach ($results as $manager) {
    echo '
        <tr>
            <td>'.$l. '</td>
            <td>'.$manager['login'].'</td>
            <td>'.$manager['name'].' </td>
            <td>'.$manager['mail'].'</td>
            <td>'.$manager['register_date'].'</td>
            <td>'.$manager['station_name'].'</td>
            <td>'.$manager['city'].',</br>'.$manager['street'].',</br>'.$manager['voivodeship'].'</td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editmanager&id='.$manager['user_id'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć użytkownika '.$manager['login'].'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$manager['user_id'].'\'>
                                    <button type=\'submit\' name=\'deleteManager\' class=\'btn btn-success\'>Tak</button> 
                                    <button type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'>Nie</button>
                                </center>
                            </div>
                        </form>">
                    <i class=\'glyphicon glyphicon-trash\' style="color: black;"></i></a>
                </center>
            </td>
        </tr>
        ';
    $l++;
}//end foreach
foreach ($results1 as $manager) {
    echo '
        <tr>
            <td>'.$l. '</td>
            <td>'.$manager['login'].'</td>
            <td>'.$manager['name'].' </td>
            <td>'.$manager['mail'].'</td>
            <td>'.$manager['register_date'].'</td>
            <td></td>
            <td></td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editmanager&id='.$manager['user_id'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć użytkownika '.$manager['login'].'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$manager['user_id'].'\'>
                                    <button type=\'submit\' name=\'deleteManager\' class=\'btn btn-success\'>Tak</button> 
                                    <button type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'>Nie</button>
                                </center>
                            </div>
                        </form>">
                    <i class=\'glyphicon glyphicon-trash\' style="color: black;"></i></a>
                </center>
            </td>
        </tr>
        ';
    $l++;
}//end foreach
echo '</tbody></table>';
echo '<a href="'.$config['page_url'].'?page=register"><input type="submit" class="btn btn-primary" value="Dodaj kierownika"/></a>';

if(isset($_POST['deleteManager'])){
    $deleted = $entityManager->find('User', $_POST['id']);

    $description = 'Usunięto użytkownika. ' . 'Login: ' . $deleted->getLogin() . ', Nazwa: ' . $deleted->getName() . ', E-mail: ' . $deleted->getMail() . ', Grupa: ' . $config['account_types'][$deleted->getGroupId()];
    makeLog($entityManager, 'Usunięcie(użytkownik)', $description);

    $entityManager->remove($deleted);
    $entityManager->flush();

    $deleted = $entityManager->getRepository('Managers')->findBy(array('Users_user_id' => $_POST['id']));
    $entityManager->remove($deleted);
    $entityManager->flush();

    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=managers";
          </script>';
}
