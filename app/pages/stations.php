<?php
	//do dostosowania!!!

?>

<?php
echo '<h2>Nasze stacje:</h2><hr class="style-one"></hr>';

require_once "bootstrap.php";

echo '<a href="'.$config['page_url'].'?page=stations&option=8&id="><input type="submit" class="btn btn-primary" value="Dodaj stację"/></a></br></br>';

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
    echo sprintf('
        <tr>
            <td>'.$l. '</td>
            <td>'.$station->getName().'</td>
            <td>'.$station->getVoivodeship().'</td>
            <td>'.$station->getCity().'</td>
            <td>'.$station->getStreet().'</td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editstation&id='.$station->getStationId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <!--<a href="'.$config['page_url'].'?page=deletestation&option=1&id='.$station->getStationId().'"><input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a>-->
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć stacje '.$station->getName().'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$station->getStationId().'\'>
                                    <button type=\'submit\' name=\'deleteStation\' class=\'btn btn-success\'>Tak</button> 
                                    <button type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'>Nie</button>
                                </center>
                            </div>
                        </form>">
                    <i class=\'glyphicon glyphicon-trash\' style="color: black;"></i></a>
                </center>
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



