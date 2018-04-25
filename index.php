<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once "bootstrap.php";

require('app/config.php');
require('app/functions.php');

$time_now = time();
$group = 0;

if(!empty($_SESSION['user'])) {
	if(empty($_SESSION['token'])) {
		session_destroy();
		$_SESSION = array();
		header('Location: '.$config['page_url']);
		die;
	}
//	$user = $db->select_single('SELECT * FROM users WHERE id = '.(int)$_SESSION['user']);
    $user = $entityManager->find('User', $_SESSION['user']);
	if($user === null || $user->getToken() != $_SESSION['token']) {
		session_destroy();
		$_SESSION = array();
		header('Location: '.$config['page_url']);
		die;
	}
	$group = $user->getGroupId();
}

$title = $config['title'];
$option = 0;
if(!empty($_GET['option'])) $option = $_GET['option'];
$page = 'main';
if(!empty($_GET['page'])) $page = $_GET['page'];
checkPageAccess($page, $group, $config['pages_groups'], $config['page_url']);
require('layout/header.php');
require('app/pages/'.$page.'.php');
require('layout/footer.php');
