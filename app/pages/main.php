<?phprequire_once "bootstrap.php";if(isset($_GET['page'])){    if(!$_GET['page']=='main')        return;    getIndex();}if(!isset($_GET['page']) && !isset($_GET['voivode'])){    getSearchPanel();}echo '<h2>Witaj!</h2><h2 class="style-one"></h2>';$stations = $entityManager->createQuery("SELECT s.station_id, s.station_name, s.city, s.street, s.voivodeship, p.price_id, p.Stations_station_id, p.PB98, p.PB95, p.OIL, p.LPG FROM Stations s, Prices p WHERE p.Stations_station_id = s.station_id")->getResult();if(!empty($user)) {    if($user->getGroupId() == 1) {        makeSearch($entityManager);        $discount = $entityManager->find('Companies', $user->getCompaniesCompanyId());        if(!empty($_GET['voivode'])) $stations = $entityManager->createQuery("SELECT s.station_id, s.station_name, s.city, s.street, s.voivodeship, p.price_id, p.Stations_station_id, p.PB98, p.PB95, p.OIL, p.LPG FROM Stations s, Prices p WHERE p.Stations_station_id = s.station_id AND s.voivodeship = '".$_GET['voivode']."' ")->getResult();        if(!empty($_GET['city'])) $stations = $entityManager->createQuery("SELECT s.station_id, s.station_name, s.city, s.street, s.voivodeship, p.price_id, p.Stations_station_id, p.PB98, p.PB95, p.OIL, p.LPG FROM Stations s, Prices p WHERE p.Stations_station_id = s.station_id AND s.city = '".$_GET['city']."' ")->getResult();        if(!empty($_GET['voivode']) && !empty($_GET['city'])) $stations = $entityManager->createQuery("SELECT s.station_id, s.station_name, s.city, s.street, s.voivodeship, p.price_id, p.Stations_station_id, p.PB98, p.PB95, p.OIL, p.LPG FROM Stations s, Prices p WHERE p.Stations_station_id = s.station_id AND s.voivodeship = '".$_GET['voivode']."' AND s.city = '".$_GET['city']."' ")->getResult();        printStations($stations, $discount->getDiscount());    }}else{    makeSearch($entityManager);    if(!empty($_GET['voivode'])) $stations = $entityManager->createQuery("SELECT s.station_id, s.station_name, s.city, s.street, s.voivodeship, p.price_id, p.Stations_station_id, p.PB98, p.PB95, p.OIL, p.LPG FROM Stations s, Prices p WHERE p.Stations_station_id = s.station_id AND s.voivodeship = '".$_GET['voivode']."' ")->getResult();    if(!empty($_GET['city'])) $stations = $entityManager->createQuery("SELECT s.station_id, s.station_name, s.city, s.street, s.voivodeship, p.price_id, p.Stations_station_id, p.PB98, p.PB95, p.OIL, p.LPG FROM Stations s, Prices p WHERE p.Stations_station_id = s.station_id AND s.city = '".$_GET['city']."' ")->getResult();    if(!empty($_GET['voivode']) && !empty($_GET['city'])) $stations = $entityManager->createQuery("SELECT s.station_id, s.station_name, s.city, s.street, s.voivodeship, p.price_id, p.Stations_station_id, p.PB98, p.PB95, p.OIL, p.LPG FROM Stations s, Prices p WHERE p.Stations_station_id = s.station_id AND s.voivodeship = '".$_GET['voivode']."' AND s.city = '".$_GET['city']."' ")->getResult();    printStations($stations, 0);}