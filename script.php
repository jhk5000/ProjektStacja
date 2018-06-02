<?php
$db = new mysqli('cinmarr.nazwa.pl', 'cinmarr_stacja', 'Stacja01', 'cinmarr_stacja');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$query = "SELECT id FROM avgprices";
$result = mysqli_query($db, $query);
if(empty($result)) {
	$sql = "CREATE TABLE avgprices(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	city VARCHAR(255) NOT NULL,
	PB98 VARCHAR(255) NOT NULL,
	PB95 VARCHAR(255) NOT NULL,
	OIL VARCHAR(255) NOT NULL,
	LPG VARCHAR(255) NOT NULL,
	reg_date datetime
	)";
	if ($db->query($sql) === TRUE) {
		echo "Table avgprices created successfully";
	} else {
		echo "Error creating table: " . $db->error;
	}
}
$sql = "DELETE FROM avgprices";
$db->query($sql);

$query = "SELECT city, ROUND(AVG(PB98), 2) as PB98, ROUND(AVG(PB95), 2) as PB95, ROUND(AVG(OIL), 2) as OIL, ROUND(AVG(LPG), 2) as LPG FROM (SELECT s.city, p.PB98, p.PB95, p.OIL, p.LPG FROM stations s, prices p WHERE s.station_id = p.Stations_station_id) as x GROUP BY city";
$result = $db->query($query);
$results = $result->num_rows;
for($i=0;$i<$results;$i++){
	$row = $result->fetch_assoc();
	$sql = "INSERT INTO avgprices (city, PB98, PB95, OIL, LPG, reg_date) VALUES ('".$row['city']."', '".$row['PB98']."', '".$row['PB95']."','".$row['OIL']."','".$row['LPG']."','".date("y-m-d H:i:s")."')";
	$db->query($sql);
}
