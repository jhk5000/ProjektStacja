<?php
	//do dostosowania!!!

?>

<?php
echo '<h2>Nasze stacje:</h2><hr class="style-one"></hr>';

require_once "bootstrap.php";

//pobranie wszystkich uzytkowników z bazy i wyswietlnie ich imion i nazwisk
$stationRepository = $entityManager->getRepository('Stations');
$stations = $stationRepository->findAll();
$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		  <th>lp.</th>
			<th>Nazwa</th>
			<th>Województwo</th>
			<th>Miasto</th>
			<th>Ulica</th>
			<th>Akcja</th>
		  </tr>
		</thead>
		<tbody>';
foreach ($stations as $station) {
    echo sprintf('<tr><td>'.$l. '</td><td>'.$station->getName().'</td><td>'.$station->getVoivodeship().'</td>
        <td>'.$station->getCity().'</td><td>'.$station->getStreet().'</td>
        <td><a href="'.$config['page_url'].'?page=edituser&id='.$station->getStationId().'"><input type="submit" class="btn btn-info btn-xs" value="Edytuj"/></a> 
            <a href="'.$config['page_url'].'?page=deleteuser&option=1&id='.$station->getStationId().'">
        <input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a></td></tr>');
    $l++;
}//end foreach

echo '</tbody></table>';
echo '<a href="'.$config['page_url'].'?page=stations&option=8&id="><input type="submit" class="btn btn-primary" value="Dodaj stację"/></a>';

//foreach ($users as $user) {
//    echo "<br>";
//    echo sprintf("$l. %s \n", $user->getInfoAboutCustomer());
//        $l++;
//}



