<?php
function alert($type, $text) {
    if($type == 1) {
        echo '<div class="alert alert-success"><strong>Sukces:</strong> '.$text.'</div>';
    } else {
        echo '<div class="alert alert-warning"><strong>Błąd:</strong> '.$text.'</div>';
    }
}
function getLoginWindow() {
    global $config;
    return '<div id="loginBox" class="modalWindow">
				<div id="blackX" onClick="app.closeModal();"></div>
				<h2>Logowanie</h2><hr class="style-one"></hr>
				<b>Login:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="login_name" value=""/>
				<b>Hasło:</b> <input onkeypress="app.check_key(event);" type="password" class="form-control" id="login_password" value=""/></br>
				<center><input class="btn btn-primary btn-ls" type="submit" id="login_button" onClick="app.login();" value="Zaloguj"/> 
				<a href="'.$config['page_url'].'?page=lostpassword"><input class="btn btn-info btn-ls" type="submit" value="Przypominj Hasło"/></a></center>
				</div>';
}
// To służyło do edytowania tematów prac dyplomowych. Można zmienić na edytowanie np stacji
function getSubjectWindow($subjects) {
    $output = '<div id="subjectBox" class="modalWindow">
				<div id="blackX" onClick="app.closeModal();"></div>
				<h2>Wybierz Kierunki</h2><hr class="style-one"></hr>
				<div class="row">
				<div class="col-lg-6">';
    if($subjects)
        foreach($subjects as $s)
            $output .= '<input type="checkbox" onChange="app.onSubjectChange('.$s['id'].');" id="subject_'.$s['id'].'" value="0"> '.$s['name'].'<br/>';
    $output .= '</div></div><br/>
				<center><input class="btn btn-primary btn-lg" type="submit" onClick="app.closeModal();" value="Zamknij"/></center>
				</div>';
    return $output;
}
function checkPageAccess($page, $group, $access, $url) {
    if($access[$page])
        foreach($access[$page] as $a)
            if($group == $a)
                return;
    header('Location: '.$url);
}
//generowanie tokenu
function generateToken() {
    $newcode = NULL;
    $acceptedChars = '123456789zxcvbnmasdfghjklqwertyuiop';
    for($i=0; $i < 50; $i++) {
        $cnum[$i] = $acceptedChars{mt_rand(0, 33)};
        $newcode .= $cnum[$i];
    }
    return $newcode;
}
//utworzenie menu użytkownika

function getUserMenu($group) {
    global $config;
    global $page;
    //Konfiguracja dla klienta biznesowego
    if($group == 1) {
    }
    // Konfiguracja dla kierownika
    elseif($group == 2) {
        if ($page == 'mystation')
            echo '<a href="' . $config['page_url'] . '?page=mystation" class="list-group-item1 active">Moja stacja</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=mystation" class="list-group-item1">Moja stacja</a>';
        if ($page == 'register')
            echo '<a href="' . $config['page_url'] . '?page=register" class="list-group-item active">Dodaj użytkownika</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=register" class="list-group-item">Dodaj użytkownika</a>';
        if ($page == 'customers')
            echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item1 active">Klienci</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item1">Klienci</a>';
        if ($page == 'addcompany')
            echo '<a href="' . $config['page_url'] . '?page=addcompany" class="list-group-item active">Dodaj firmę</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=addcompany" class="list-group-item">Dodaj firmę</a>';
        if ($page == 'companies')
            echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item active">Firmy</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item">Firmy</a>';
    }
    //konfiguracja dla własciciela
    elseif($group == 3) {
        if ($page == 'register')
            echo '<a href="' . $config['page_url'] . '?page=register" class="list-group-item active">Dodaj użytkownika</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=register" class="list-group-item">Dodaj użytkownika</a>';
        if ($page == 'customers')
            echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item active">Klienci</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item">Klienci</a>';
        if ($page == 'managers')
            echo '<a href="' . $config['page_url'] . '?page=managers" class="list-group-item1 active">Kierownicy</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=managers" class="list-group-item1">Kierownicy</a>';
        if ($page == 'addcompany')
            echo '<a href="' . $config['page_url'] . '?page=addcompany" class="list-group-item active">Dodaj firmę</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=addcompany" class="list-group-item">Dodaj firmę</a>';
        if ($page == 'companies')
            echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item1 active">Firmy</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item1">Firmy</a>';
        if ($page == 'addstation')
            echo '<a href="' . $config['page_url'] . '?page=addstation" class="list-group-item active">Dodaj stację</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=addstation" class="list-group-item">Dodaj stację</a>';
        if ($page == 'stations')
            echo '<a href="' . $config['page_url'] . '?page=stations" class="list-group-item active">Stacje</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=stations" class="list-group-item">Stacje</a>';
        if ($page == 'prices')
            echo '<a href="' . $config['page_url'] . '?page=prices" class="list-group-item1 active">Ceny paliw</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=prices" class="list-group-item1">Ceny paliw</a>';
    }
    //Konfiguracja dla administratora
    elseif($group == 4) {
        if ($page == 'register')
            echo '<a href="' . $config['page_url'] . '?page=register" class="list-group-item active">Dodaj użytkownika</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=register" class="list-group-item">Dodaj użytkownika</a>';
        if ($page == 'customers')
            echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item active">Klienci</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item">Klienci</a>';
        if ($page == 'managers')
            echo '<a href="' . $config['page_url'] . '?page=managers" class="list-group-item1 active">Kierownicy</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=managers" class="list-group-item1">Kierownicy</a>';
        if ($page == 'addcompany')
            echo '<a href="' . $config['page_url'] . '?page=addcompany" class="list-group-item active">Dodaj firmę</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=addcompany" class="list-group-item">Dodaj firmę</a>';
        if ($page == 'companies')
            echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item1 active">Firmy</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item1">Firmy</a>';
        if ($page == 'addstation')
            echo '<a href="' . $config['page_url'] . '?page=addstation" class="list-group-item active">Dodaj stację</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=addstation" class="list-group-item">Dodaj stację</a>';
        if ($page == 'stations')
            echo '<a href="' . $config['page_url'] . '?page=stations" class="list-group-item active">Stacje</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=stations" class="list-group-item">Stacje</a>';
        if ($page == 'prices')
            echo '<a href="' . $config['page_url'] . '?page=prices" class="list-group-item1 active">Ceny paliw</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=prices" class="list-group-item1">Ceny paliw</a>';
        if ($page == 'logs')
            echo '<a href="' . $config['page_url'] . '?page=logs&event=" class="list-group-item active">Logi zdarzeń</a>';
        else
            echo '<a href="' . $config['page_url'] . '?page=logs&event=" class="list-group-item">Logi zdarzeń</a>';
    }
    if($page == 'messages')
        echo '<a href="'.$config['page_url'].'?page=messages" class="list-group-item active">Wiadomości</a>';
    else
        echo '<a href="'.$config['page_url'].'?page=messages" class="list-group-item">Wiadomości</a>';
}
// pobieranie imienia i nazwiska
function getName(array $array) {
    $string = '';
    if (empty($array['name']) === false && $array['name'] !== null) {
        $string .= $array['name'];
    }//end if
    if (empty($array['lastname']) === false && $array['lastname'] !== null) {
        $string .= ' '.$array['lastname'];
    }//end if
    return trim($string);
}
function scripts(){
    global $config;
    echo '  
            <script async="" src="js/jquery.min.js?v=1.72"></script>
            <script async="" src="js/app.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script>
                $(document).ready(function(){
                    $(\'[data-toggle="popover"]\').popover();
                });
            </script>
            
            <script>
                $(document).ready(function(){
                    $(\'[data-toggle="tooltip"]\').tooltip();
                });
            </script>
            
            <script>
                 var time = new Date().getTime();
                 var refreshtime = 1000 * 60 * 15;
                 
                 function refresh() {
                     $(document.body).bind("mousemove keypress keydown click scroll", function(e) {
                     time = new Date().getTime();
                     });
                     if(new Date().getTime() - time >= refreshtime) {
                         if('.isset($_SESSION['user']).'){
                            app.logout();
                         }
                     }
                     else{
                         setTimeout(refresh, refreshtime);
                     }
                 }
            </script>
            
            <script>
                 function getIndex(){
                    window.location.href="'.$config['page_url'].'";
                 }
            </script>
            
            <script>  
                 function getEvent(){
                    var type = document.getElementById(\'event_type\').value;
                    window.location.href="'.$config['page_url'].'?page=logs&event="+type;
                 }
            </script>
            
            <script> 
                 function getVoivode(){
                    var type = document.getElementById(\'voivode\').value;
                    window.location.href="'.$config['page_url'].'?voivode="+type+"&city=";
                 }
            </script>
            
            <script> 
                 function getCity(){
                    var type = document.getElementById(\'voivode\').value;
                    var type1 = document.getElementById(\'city\').value;
                    window.location.href="'.$config['page_url'].'?voivode="+type+"&city="+type1;
                 }
            </script>
            ';
}
function compareDates($date1, $logs){
    $date2 = date("y-m-d H:i:s");
    if (count($logs) > 2 && strtotime($date2) < strtotime($date1)+300){
        return 1;
    }else{
        return 0;
    }
}
function makeLog($entityManager, $name, $description){
    if($name == 'Logowanie(poprawne)' || $name == 'Logowanie(błędne)'){
        $changer = '';
    }else{
        $loged = $entityManager->find('User', $_SESSION['user']);
        $changer = $loged->getUserId() . ', ' . $loged->getLogin() . ', ' . $loged->getName();
    }
    $event = new Events();
    $event->setEventName($name);
    $event->setEventDate(date("y-m-d H:i:s"));
    $event->setChanger($changer);
    $event->setDescription($description);
    $entityManager->persist($event);
    $entityManager->flush();
}
function getIP() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function getIndex(){
    global $config;
    echo '   
        <script>
            window.location.href="'.$config['page_url'].'";
	    </script>
    ';
}
function getSearchPanel(){
    global $config;
    echo '   
        <script>
            window.location.href="'.$config['page_url'].'?voivode=&city=";
	    </script>
    ';
}
function printStations($stations, $discount){
    foreach ($stations as $station){
        echo '
            <table class="table1">
                <tbody style="border: 1px solid #a6e1ec">
                    <tr>
                        <td width="60%" height="10%">
                            <p class="stationName">'.$station['station_name'].'</p>
                            <p class="stationAddress">'.$station['city'].', '.$station['street'].'</p>
                        </td>
                        <th width="40%" height="200px" rowspan="2">
                ';
        if($station['PB98']!=null) echo '<p class="priceValue">PB98: '.round(floatval($station['PB98'])*(1-($discount/100)),2) .' PLN</p>';
        if($station['PB95']!=null) echo '<p class="priceValue">PB95: '.round(floatval($station['PB95'])*(1-($discount/100)),2) .' PLN</p>';
        if($station['OIL']!=null) echo '<p class="priceValue">ON: '.round(floatval($station['OIL'])*(1-($discount/100)),2) .' PLN</p>';
        if($station['LPG']!=null) echo '<p class="priceValue">LPG: '.round(floatval($station['LPG'])*(1-($discount/100)),2) .' PLN</p>';
        echo '
                        </th>
                    </tr>
                    <tr>
                        <td height="90%"></td>
                    </tr>	
                </tbody>
            </table>
        ';
    }
}
function makeSearch($entityManager){
    echo '
        <table class="table1"><tr><td width="50%">
        <b>Województwo:</b></br>
        <select id="voivode" onChange="getVoivode()" class="form-control1">
    ';
    if(empty($_GET['voivode'])){
        $query = $entityManager->createQuery("SELECT DISTINCT s.voivodeship FROM Stations s ORDER BY s.voivodeship");
        $results = $query->getResult();
        echo '
            <option value=""></option>
        ';
        foreach ($results as $voivode){
            echo '
                <option value="'.$voivode['voivodeship'].'">'.$voivode['voivodeship'].'</option>
            ';
        }
    }else{
        $query = $entityManager->createQuery("SELECT DISTINCT s.voivodeship FROM Stations s WHERE s.voivodeship NOT LIKE '".$_GET['voivode']."' ORDER BY s.voivodeship");
        $results = $query->getResult();
        echo '
            <option value="'.$_GET['voivode'].'">'.$_GET['voivode'].'</option>
            <option value=""></option>
        ';
        foreach($results as $voivode){
            echo '
                <option value="'.$voivode['voivodeship'].'">'.$voivode['voivodeship'].'</option>
            ';
        }
    }
    echo '
        </select>
    ';
    echo '
        </td><td width="50%">
        <b>Miasto:</b></br>
        <select id="city" onChange="getCity()" class="form-control1">
    ';
    if(empty($_GET['city'])){
        if(!empty($_GET['voivode']))
            $query = $entityManager->createQuery("SELECT DISTINCT s.city FROM Stations s WHERE s.voivodeship = '".$_GET['voivode']."' ORDER BY s.city");
        else
            $query = $entityManager->createQuery("SELECT DISTINCT s.city FROM Stations s ORDER BY s.city");
        $results = $query->getResult();
        echo '
            <option value=""></option>
        ';
        foreach ($results as $city){
            echo '
                <option value="'.$city['city'].'">'.$city['city'].'</option>
            ';
        }
    }else{
        if(!empty($_GET['voivode']))
            $query = $entityManager->createQuery("SELECT DISTINCT s.city FROM Stations s WHERE s.city NOT LIKE '".$_GET['city']."' AND s.voivodeship = '".$_GET['voivode']."' ORDER BY s.city");
        else
            $query = $entityManager->createQuery("SELECT DISTINCT s.city FROM Stations s WHERE s.city NOT LIKE '".$_GET['city']."' ORDER BY s.city");
        $results = $query->getResult();
        echo '
            <option value="'.$_GET['city'].'">'.$_GET['city'].'</option>
            <option value=""></option>
        ';
        foreach($results as $city){
            echo '
                <option value="'.$city['city'].'">'.$city['city'].'</option>
            ';
        }
    }
    echo '
        </td></tr></table>
        </select>
    ';
}