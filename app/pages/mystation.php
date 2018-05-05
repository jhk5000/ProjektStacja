<?php
echo '<h2>Moje stacje</h2><hr class="style-one"></hr>';
?>

<?php
require_once "bootstrap.php";
$query = $entityManager->createQuery("SELECT s.station_id, u.user_id, s.station_name, s.city, s.street FROM Stations s, User u, Managers m WHERE u.user_id = m.Users_user_id AND s.station_id = m.Stations_station_id AND m.Users_user_id=".$_SESSION['user']." ");
$myStations = $query->getResult();
echo '
	<table class="table1">
		<tbody style="border: 1px solid #a6e1ec">';
foreach($myStations as $station) {
    $price = $entityManager->getRepository('Prices')->findOneBy(array('Stations_station_id' => $station['station_id']));
    echo '
		<tr>
			<td width="70%" height="10%">
				<p class="stationName">'.$station['station_name'].'</p>
				<p class="stationAddress">'.$station['city'].', '.$station['street'].'</p>
			</td>
			<th width="30%" height="200px" rowspan="2">
	';
    if($price->getPB98()!=null) echo '<p class="priceValue">PB98: '.$price->getPB98().' PLN</p>';
    if($price->getPB95()!=null) echo '<p class="priceValue">PB95: '.$price->getPB95().' PLN</p>';
    if($price->getOIL()!=null) echo '<p class="priceValue">ON: '.$price->getOIL().' PLN</p>';
    if($price->getLPG()!=null) echo '<p class="priceValue">LPG: '.$price->getLPG().' PLN</p>';
    echo '
			<a href="'.$config['page_url'].'?page=editprice&id='.$price->getPriceId().'&station='.$station['station_id'].'" style="float: right"><i class=\'glyphicon glyphicon-pencil\' style="font-size: 20px"></i></a>
			</th>
		</tr>
		<tr>
			<td height="90%"></td>
		</tr>	
		
	';
}
echo '</tbody></table>';