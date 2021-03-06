<?php
//do dostosowania!!!
?>

<?php
echo '<h2>Nasze stacje:</h2><hr class="style-one"></hr>';
echo '<a href="'.$config['page_url'].'?page=addstation"><input type="submit" class="btn btn-primary" value="Dodaj stację"/></a><br>';
require_once "bootstrap.php";
$stationRepository = $entityManager->getRepository('Stations');
$stations = $stationRepository->findAll();
echo '<br><table class="table table-bordered table-hover fixed">
		<thead>
		  <tr>
			<th width="25%">Nazwa</th>
			<th width="20%">Województwo</th>
			<th width="20%">Miasto</th>
			<th width="25%">Ulica</th>
			<th width="8%">Akcja</th>
		  </tr>
		</thead>
		<tbody>';
foreach ($stations as $station) {
    echo sprintf('
        <tr>
            <td>'.$station->getStationName().'</td>
            <td>'.$station->getVoivodeship().'</td>
            <td>'.$station->getCity().'</td>
            <td>'.$station->getStreet().'</td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editstation&id='.$station->getStationId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <!--<a href="'.$config['page_url'].'?page=deletestation&option=1&id='.$station->getStationId().'"><input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a>-->
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć stacje '.$station->getStationName().'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
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
}//end foreach
echo '</tbody></table>';
echo '<a href="'.$config['page_url'].'?page=addstation"><input type="submit" class="btn btn-primary" value="Dodaj stację"/></a>';
if(isset($_POST['deleteStation'])){
    $deleted = $entityManager->find('Stations', $_POST['id']);
    $description = 'Usunięto stację. ' . 'Nazwa: ' . $deleted->getStationName() . ', Adres: ' . $deleted->getCity()  . ', ' . $deleted->getStreet()  . ', ' . $deleted->getVoivodeship() ;
    makeLog($entityManager, 'Usunięcie(stacja)', $description);
    $entityManager->remove($deleted);
    $entityManager->flush();
    $deleted = $entityManager->getRepository('Managers')->findBy(array('Stations_station_id' => $_POST['id']));
    foreach ($deleted as $del){
        $entityManager->remove($del);
    }
    $entityManager->flush();
    $deleted = $entityManager->getRepository('Prices')->findBy(array('Stations_station_id' => $_POST['id']));
    foreach ($deleted as $del){
        $entityManager->remove($del);
    }
    $entityManager->flush();
    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=stations";
          </script>';
}
