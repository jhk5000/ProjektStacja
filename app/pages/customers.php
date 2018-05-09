<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';
echo '<a href="'.$config['page_url'].'?page=register"><input type="submit" class="btn btn-primary" value="Dodaj klienta"/></a><br>';
require_once "bootstrap.php";
$query = $entityManager->createQuery("SELECT u.login, u.name, u.mail, u.register_date, c.company_name, c.address, u.user_id, c.company_id FROM User u, Companies c where u.Companies_company_id = c.company_id AND u.group_id = 1");
$results = $query->getResult();
$query1 = $entityManager->createQuery("SELECT u.login, u.name, u.mail, u.register_date, u.user_id FROM User u WHERE u.Companies_company_id IS NULL AND u.group_id = 1");
$results1 = $query1->getResult();
echo '<br><table class="table table-bordered table-hover fixed">
		<thead>
		  <tr>
			<th width="15%">Login</th>
			<th width="15%">Nazwa</th>
			<th width="15%">Mail</th>
			<th width="15%">Data rejestracji</th>
			<th width="15%">Firma</th>
            <th width="15%">Adres</th>
			<th width="8%">Akcja</th>
		  </tr>
		</thead>
		<tbody>';
foreach ($results as $user) {
    echo '
        <tr>
            <td>'.$user['login'].'</td>
            <td>'.$user['name'].' </td>
            <td>'.$user['mail'].'</td>
            <td>'.$user['register_date'].'</td>
            <td>'.$user['company_name'].'</td>
            <td>'.$user['address'].'</td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=edituser&id='.$user['user_id'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć użytkownika '.$user['login'].'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$user['user_id'].'\'>
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
}//end foreach
foreach ($results1 as $user) {
    echo '
        <tr>
            <td>'.$user['login'].'</td>
            <td>'.$user['name'].' </td>
            <td>'.$user['mail'].'</td>
            <td>'.$user['register_date'].'</td>
            <td></td>
            <td></td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=edituser&id='.$user['user_id'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć użytkownika '.$user['login'].'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$user['user_id'].'\'>
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
}//end foreach
echo '</tbody></table>';
echo '<a href="'.$config['page_url'].'?page=register"><input type="submit" class="btn btn-primary" value="Dodaj klienta"/></a>';
if(isset($_POST['deleteUser'])){
    $deleted = $entityManager->find('User', $_POST['id']);
    $description = 'Usunięto użytkownika. ' . 'Login: ' . $deleted->getLogin() . ', Nazwa: ' . $deleted->getName() . ', E-mail: ' . $deleted->getMail() . ', Grupa: ' . $config['account_types'][$deleted->getGroupId()];
    makeLog($entityManager, 'Usunięcie(użytkownik)', $description);
    $entityManager->remove($deleted);
    $entityManager->flush();
    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=customers";
          </script>';
}