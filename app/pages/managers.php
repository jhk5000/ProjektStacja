<?php

if (empty($_GET['option']) === true) {
	echo '<h2>Kierownicy</h2><hr class="style-one"></hr>';
	//zapytanie do dostosowania pod wyciąganie kierowników z bazy danych !!!!!!!!!!!!
	$managers = $db->select_multi('SELECT u.*, d.name as d_name FROM users u LEFT JOIN departments d ON d.id = u.subject_ids WHERE u.group_id = 2');
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
			echo '<tr><td>'.$s['name'].'</td><td>'.$s['lastname'].'</td><td>'.$s['d_name'].'</td><td><a href="'.$config['page_url'].'?page=edituser&id='.$s['id'].'"><input type="submit" class="btn btn-info btn-xs" value="Edytuj"/></a> <a href="'.$config['page_url'].'?page=promoters&option=1&id='.$s['id'].'"><input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a></td></tr>';
		}
	}
	echo '</tbody></table>';
	// usuwanie kierowników
} else if ($_GET['option'] == 1) {
	$db->query('DELETE FROM users WHERE id = '.(int) $_GET['id']);
	header('Location: ?page=managers');
}
