<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title><?php echo $title;?></title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/basic.css" rel="stylesheet" type="text/css" media="screen">
    <?php scripts(); ?>
</head>
<body onload="refresh()">
<div id="box"></div>
<div id="page">
    <div id="top_menu">
        <div class="text">
            <a href="https://mrcin.pl/stacja/index.php"><img src="images/logos.png" style=" margin-top:-20px; margin-left:5px;" width="300px" height="65px" alt="logo" /></a>
            <div class="left"><a href="<?php echo $config['https://mrcin.pl/stacja/index.php'];?>"><?php echo $config['logo_title'];?></a></div>
            <div class="right">
                <?php if(empty($user)) { ?>
                    <span name="login" class="top pointer" onClick="app.openWindow(1);">Zaloguj</span>
                <?php } else { ?>
                    <?php echo $user->getName(); ?> <small>(<?php echo $config['account_types'][$user->getGroupId()];?>)</small> | <a href="<?php echo $config['page_url'];?>?page=myaccount&option="><span class="top pointer">Moje Konto</a></span> | <span name="logout" class="top pointer" onClick="app.logout();">Wyloguj</span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="content">
        <div id="menu">
            <div class="panel panel-primary">
                <div class="list-group">
                    <?php if(!empty($user)) getUserMenu($group); ?>
                </div>
            </div>
        </div>
        <div id="view">
