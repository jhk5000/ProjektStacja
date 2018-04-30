<?php

require_once "bootstrap.php";
$user = $entityManager->find('User', $_SESSION['user']);

// Czynnosc dla option == 1 //

echo '<h2>Ceny paliw na naszych stacjach:</h2><hr class="style-one"></hr>';
$stationsRepository = $entityManager->getRepository('Stations');
$stations = $stationsRepository->findAll();
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
            <td>' . $station->getStationName() . '</td>
            <td>' . $station->getVoivodeship() . '</td>
            <td>' . $station->getCity() . '</td>
            <td>' . $station->getStreet() . '</td>
            ');
    $priceRepository = $entityManager->getRepository('Prices');
    $price = $priceRepository->findOneBy(array('Stations_station_id' => $station->getStationId()));
    if($price){
        echo sprintf(' 
                <td>'. $price->getPB98().'</td>
                <td>'. $price->getPB95().'</td>
                <td>'. $price->getOIL().'</td>
                <td>'. $price->getLPG().'</td>
                
            ');
    }else{
        echo sprintf('
                    <td></td><td></td><td></td><td></td>
                    
                    ');
    }
    echo '</tr>';
    $l++;
}//end foreach


