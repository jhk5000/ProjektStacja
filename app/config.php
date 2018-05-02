<?php

$config = array();

$config['title'] = 'Stacje paliw u Romana';

$config['db']['host']     = 'localhost';
$config['db']['username'] = 'root';
$config['db']['password'] = '';
$config['db']['database'] = 'baza';

define('TIME_NOW', time());

$config['page_url']      = 'http://localhost/ProjektStacja/index.php';
$config['logo_title']    = 'Bolek Stations';
$config['account_types'] = array(1 => 'Klient', 2 => 'Kierownik', 3 => "Wlasciciel", 4 => 'Administrator');

$config['pages_groups'] = array(
    // nazwa strony --uprawnienia -- stara nazwa strony -> nowa nazwa -- co robi
	'main'         => array(0,1,2,3,4), //strona głowna - dostęp dla każego
	'myaccount'    => array(1,2,3,4), // edycja konta -  zostaje
	'lostpassword' => array(0), // przypomnienie hasła - zostaje dla niezalogowanych
	'stations'  => array(3,4), //"wydziały" -> stacje
	'customers'     => array(2,3,4), // "studenci" - > klienci
    'createuser'     => array(3,4),
	'editstation'=> array(3,4),
    'editprice'=> array(3,4),
	'managers'    => array(3,4), // " promotorzy" -> kierownicy
	'faq'          => array(0,1,2,3,4),
	'edituser'     => array(3,4), //edycja konto użytkowników
    'editmanager'     => array(3,4),
    'editdiscount'     => array(2,3,4),
	'messages'     => array(1,2,3,4), // kontakt pomiedzy użytkownikami
	'mystation'    => array(2), // "myworks" - > mystation (moja stacja, dla kierownika)
	'companies' => array(3,4), // Wyswietlanie firm i ich znizek
	'archive'      => array(2,3,4), // zamkniete stacje w archiwum
    'myprices'       => array(1), // "topics" ->ceny na stacji dla klienta
    'register'      => array(3,4),
    'addstation'      => array(3,4),
    'ourpricesoffuelsales'=>array(2,3,4), //ustalanie cen paliw
    'editcompany'   =>array(3,4),
    'logs'      => array(4),
);

$config['password']['max_lenght'] = 30;
$config['password']['min_lenght'] = 6;

$config['login']['min_lenght'] = 5;
$config['login']['max_lenght'] = 20;
