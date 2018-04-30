<?php

require_once "bootstrap.php";
$user = $entityManager->find('User', $_SESSION['user']);

// Czynnosc dla option == 1 //

    echo '<h2>Ceny paliw na Twoich stacjach:</h2><hr class="style-one"></hr>';
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
        $prices = $pricesRepository->findBy(array('Stations_station_id' => $station->getStationId()));
        foreach ($prices as $price)
            echo sprintf(' 
                <td>'. $price->getPrice().'</td>
       </tr>');

        $l++;
    }//end foreach
//1,1,ON,5 || 2,1,PB95,5 || 3,1,LPG,2



?>