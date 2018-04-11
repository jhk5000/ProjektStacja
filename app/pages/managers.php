<?php

if (empty($_GET['option']) === true) {
	echo '<h2>Kierownicy</h2><hr class="style-one"></hr>';
	//zapytanie do dostosowania pod wyciąganie kierowników z bazy danych !!!!!!!!!!!!
	$managers = $db->select_multi('SELECT u.*, s.name as s_name FROM users u LEFT JOIN stations s WHERE u.group_id = 2');
	echo '<table class="table table-bordered table-hover">
			<thead>
			  <tr>
				<th>Imie</th>
				<th>Nazwisko</th>
				<th>Stacja</th>
				<th width="110px"></th>
			  </tr>
			</thead>
			<tbody>';

	//wyswietlanie do dostowania pod baze danych!!!!!!!!
	if($managers) {
		foreach($managers as $s) {
			echo '<tr><td>'.$s['name'].'</td><td>'.$s['lastname'].'</td><td>'.$s['s_name'].'</td><td><a href="'.$config['page_url'].'?page=edituser&id='.$s['id'].'"><input type="submit" class="btn btn-info btn-xs" value="Edytuj"/></a> <a href="'.$config['page_url'].'?page=managers&option=1&id='.$s['id'].'"><input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a></td></tr>';
		}
	}
	echo '</tbody></table>';
	// usuwanie kierowników
} else if ($_GET['option'] == 1) {
	$db->query('DELETE FROM users WHERE id = '.(int) $_GET['id']);
	header('Location: ?page=managers');
}
