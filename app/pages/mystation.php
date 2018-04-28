<?php
	echo '<h2>Moje stacje</h2><hr class="style-one"></hr>';
?>

<?php
require_once "bootstrap.php";
$dql = "SELECT s.station_id, u.user_id. s.name, s.city, s.street FROM Stations s, User u, Managers m 
        WHERE u.user_id = m.users_user_id AND s.station_id = m.stations_station_id AND u.user_id ='1'";
$myStations = $entityManager->createQuery($dql)->getScalarResult();
$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		  <th>lp.</th>			
			<th>Nazwa</th>
			<th>Miasto</th>
			<th>Ulica</th>
			<th>Akcja</th>
		  </tr>
		</thead>
		<tbody>';
foreach($myStations as $station) {
    echo sprintf('<tr><td>'.$l. '</td><td>'.$station['s.name'].'</td><td>'.$station['s.city'].' </td>
        <td>'.$station['s.street'].'</td>
        <td><a href="'.$config['page_url'].'?page=editstation&id='.$station['s.station_id'].'"><input type="submit" class="btn btn-info btn-xs" value="Edytuj"/></a> 
            <a href="'.$config['page_url'].'?page=deletestation&option=1&id='.$station['s.station_id'].'">
        <input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a></td></tr>');
    $l++;
    //echo $myStation['s.name']." has " . $productBug['openBugs'] . " open bugs!\n";
}

echo '</tbody></table>';
