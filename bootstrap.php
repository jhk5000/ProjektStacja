<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'user1',
    'password' => 'haslo',
    'dbname'   => 'stations_db',
);
//
//$dbParams = array(
//    'driver'   => 'pdo_mysql',
//    'user'     => 'cinmarr_stacja',
//    'password' => 'Stacja01',
//    'dbname'   => 'cinmarr_stacja',
//);

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);