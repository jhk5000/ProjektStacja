<?php
$config = array();
$config['title'] = 'Stacje paliw u Romana';
$config['db']['host']     = 'localhost';
$config['db']['username'] = 'root';
$config['db']['password'] = '';
$config['db']['database'] = 'baza';
define('TIME_NOW', time());
$config['page_url']      = 'http://localhost/ProjektStacja/index.php';
$config['logo_title']    = 'Nasza stacja';
$config['account_types'] = array(1 => 'Klient', 2 => 'Kierownik', 3 => "Wlasciciel", 4 => 'Administrator');
$config['pages_groups'] = array(
    // nazwa strony --uprawnienia
    'main'         => array(0,1,2,3,4),
    'myaccount'    => array(1,2,3,4),
    'lostpassword' => array(0),
    'stations'  => array(3,4),
    'customers'     => array(2,3,4),
    'createuser'     => array(2,3,4),
    'editstation'=> array(2,3,4),
    'editprice'=> array(2,3,4),
    'managers'    => array(3,4),
    'faq'          => array(0,1,2,3,4),
    'contact'          => array(0,1,2,3,4),
    'edituser'     => array(3,4),
    'editmanager'     => array(3,4),
    'editdiscount'     => array(2,3,4),
    'mystation'    => array(2), // "myworks" - > mystation (moja stacja, dla kierownika)
    'companies' => array(2,3,4), // Wyswietlanie firm i ich znizek
    'archive'      => array(2,3,4), // zamkniete stacje w archiwum
    'myprices'       => array(1), // "topics" ->ceny na stacji dla klienta
    'register'      => array(2,3,4),
    'addstation'      => array(3,4),
    'addcompany'      => array(2,3,4),
    'prices'    => array(2,3,4),
    'editcompany'   =>array(2,3,4),
    'logs'      => array(4),
);
$config['password']['max_lenght'] = 30;
$config['password']['min_lenght'] = 6;
$config['login']['min_lenght'] = 5;
$config['login']['max_lenght'] = 20;
