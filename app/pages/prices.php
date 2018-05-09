<?php
require_once "bootstrap.php";
$user = $entityManager->find('User', $_SESSION['user']);
// Czynnosc dla option == 1 //
echo '<h2>Ceny paliw na naszych stacjach:</h2><hr class="style-one"></hr>';
$stationsRepository = $entityManager->getRepository('Stations');
$stations = $stationsRepository->findAll();
echo '<table class="table table-bordered table-hover fixed">
	<thead>
		 <tr>
			<th width="15%">Nazwa</th>
			<th width="35%">Adres</th>
			<th width="10%">PB98</th>
			<th width="10%">PB95</th>
			<th width="10%">ON</th>
			<th width="10%">LPG</th>
			<th width="8%">Akcja</th>
		  </tr>
	</thead>
	<tbody>';
foreach ($stations as $station) {
    echo sprintf('
        <tr>
            <td>' . $station->getStationName() . '</td>
            <td>' . $station->getCity() . ', ' . $station->getStreet() . ', ' . $station->getVoivodeship() . '</td>
            ');
    $priceRepository = $entityManager->getRepository('Prices');
    $price = $priceRepository->findOneBy(array('Stations_station_id' => $station->getStationId()));
    if($price){
        echo sprintf(' 
                <td>'. $price->getPB98().'</td>
                <td>'. $price->getPB95().'</td>
                <td>'. $price->getOIL().'</td>
                <td>'. $price->getLPG().'</td>
                <td>
                    <center>
                        <a href="'.$config['page_url'].'?page=editprice&id='.$price->getPriceId().'&station='.$station->getStationId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                        <a href="javascript://" title=\'<center>Czy napewno wyczyscic ceny paliw na tej stacji?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                        data-content="
                            <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                                <div class=\'form-group\'>
                                    <center><input type=\'hidden\' name=\'id\' value=\''.$price->getPriceId().'\'>
                                        <button type=\'submit\' name=\'deletePrice\' class=\'btn btn-success\'>Tak</button> 
                                        <button type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'>Nie</button>
                                    </center>
                                </div>
                            </form>">
                        <i class=\'glyphicon glyphicon-trash\' style="color: black;"></i></a>
                    </center>
                </td>
            ');
    }else{
        echo sprintf('
                    <td></td><td></td><td></td><td></td>
                    <td>
                        <center>
                            <a href="'.$config['page_url'].'?page=editprice&id=0&station='.$station->getStationId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                        </center>
                    </td>
                    ');
    }
    echo '</tr>';
}//end foreach
if(isset($_POST['deletePrice'])){
    $deleted = $entityManager->find('Prices', $_POST['id']);
    $description = 'Usunięto cenę. ' . 'PB98: ' . $deleted->getPB98() . ', PB95: ' . $deleted->getPB95() . ', ON: ' . $deleted->getOIL() . ', LPG: ' . $deleted->getLPG();
    makeLog($entityManager, 'Usunięcie(cena)', $description);
    $entityManager->remove($deleted);
    $entityManager->flush();
    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=prices";
          </script>';
}