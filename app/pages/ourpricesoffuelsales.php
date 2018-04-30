<?php

require_once "bootstrap.php";
$user = $entityManager->find('User', $_SESSION['user']);

// Czynnosc dla option == 1 //

    echo '<h2>Ceny paliw na naszych stacjach:</h2><hr class="style-one"></hr>';
    $stationRepository = $entityManager->getRepository('Stations');
    $stations = $stationRepository->findAll();
    $l = 1;
    echo '<table class="table table-bordered table-hover">
	<thead>
		 <tr>
		  <th>lp.</th>
			<th>Nazwa</th>
			<th>Województwo</th>
			<th>Miasto</th>
			<th>Ulica</th>
			<th>PB98</th>
			<th>PB95</th>
			<th>ON</th>
			<th>LPG</th>
			<th>Akcja</th>
		  </tr>
	</thead>
	<tbody>';
    foreach ($stations as $station) {
        echo sprintf('
        <tr>
            <td>' . $l . '</td>
            <td>' . $station->getName() . '</td>
            <td>' . $station->getVoivodeship() . '</td>
            <td>' . $station->getCity() . '</td>
            <td>' . $station->getStreet() . '</td>
            ');
        $priceRepository = $entityManager->getRepository('Prices');
        $prices = $priceRepository->findBy(array('Stations_station_id' => $station->getStationId()));
        foreach ($prices as $price)
            echo sprintf(' 
                <td>'. $price->getPB98().'</td>
                <td>'. $price->getPB95().'</td>
                <td>'. $price->getON().'</td>
                <td>'. $price->getLPG().'</td>
                <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editprice&id='.$price->getPriceId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                    <!--<a href="'.$config['page_url'].'?page=deleteprice&option=1&id='.$price->getPriceId().'"><input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a>-->
                    <a href="javascript://" title=\'<center>Czy napewno wyczyscic ceny paliw na tej stacji?'.$price->getPriceId().'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$user->getUserId().'\'>
                                    <button type=\'submit\' name=\'deletePrice\' class=\'btn btn-success\'>Tak</button> 
                                    <button type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'>Nie</button>
                                </center>
                            </div>
                        </form>">
                    <i class=\'glyphicon glyphicon-trash\' style="color: black;"></i></a>
                </center>
            </td>
       ');

        echo '</tr>';
        $l++;
    }//end foreach
//1,1,ON,5 || 2,1,PB95,5 || 3,1,LPG,2



?>