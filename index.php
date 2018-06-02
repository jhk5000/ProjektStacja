<?php
session_start();
error_reporting(0);
ini_set('display_errors',0);
require('bootstrap.php');
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
    $user = $entityManager->find('User', $_SESSION['user']);
    if($user === null || !password_verify($_SESSION['token'], $user->getToken())) {
        session_destroy();
        $_SESSION = array();
        header('Location: '.$config['page_url']);
        die;
    }
    $group = $user->getGroupId();
}
$title = $config['title'];
$page = 'main';
if(!empty($_GET['page'])){
    $page = $_GET['page'];
}
checkPageAccess($page, $group, $config['pages_groups'], $config['page_url']);
require('layout/header.php');
require('app/pages/'.$page.'.php');
require('layout/footer.php');