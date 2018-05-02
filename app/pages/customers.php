<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
//pobranie wszystkich uzytkowników z bazy i wyswietlnie ich imion i nazwisk
$userRepository = $entityManager->getRepository('User');
$users = $userRepository->findBy(array('group_id' => '1'));
$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		    <th width="5%">lp.</th>
			<th width="20%">Login</th>
			<th width="25%">Nazwa</th>
			<th width="25%">Mail</th>
			<th width="20%">Data rejestracji</th>
			<th width="5%">Akcja</th>
		  </tr>
		</thead>
		<tbody>';
foreach ($users as $user) {
    echo '
        <tr>
            <td>'.$l. '</td>
            <td>'.$user->getLogin().'</td>
            <td>'.$user->getName().' </td>
            <td>'.$user->getMail().'</td>
            <td>'.$user->getRegisterDate().'</td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=edituser&id='.$user->getUserId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć użytkownika '.$user->getLogin().'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$user->getUserId().'\'>
                                    <button type=\'submit\' name=\'deleteUser\' class=\'btn btn-success\'>Tak</button> 
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
echo '<a href="'.$config['page_url'].'?page=register"><input type="submit" class="btn btn-primary" value="Dodaj klienta"/></a>';

if(isset($_POST['deleteUser'])){
    $deleted = $entityManager->find('User', $_POST['id']);

    $loged = $entityManager->find('User', $_SESSION['user']);

    $entityManager->remove($deleted);
    $entityManager->flush();
    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=customers";
          </script>';
}
