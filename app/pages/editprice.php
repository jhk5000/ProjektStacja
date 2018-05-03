<?php
$loged = $entityManager->find('User', $_SESSION['user']);
if($_GET['id']!=0){
    $price = $entityManager->find('Prices', $_GET['id']);
}
$station = $entityManager->find('Stations', $_GET['station']);

echo '<h2>Edycja Użytkownika</h2><hr class="style-one"></hr>';
if($loged->getGroupId() == 3 || $loged->getGroupId() == 4) {
    if(!empty($_POST['send'])) {
        if($_GET['id']==0) $price = new Prices();
        $price->setStationsStationId($_GET['station']);

        $description = 'Edytowano cenę na stacji ' . $station->getStationName() . ', ' .  $station->getCity() . ', ' .  $station->getStreet() .
                                                     '. Nowe ceny: PB98 - ' . $_POST['pb98'] . '(' . $price->getPB98() . '), PB95 - ' . $_POST['pb95'] . '(' . $price->getPB95() . '), ON - ' . $_POST['on'] . '(' . $price->getOIL() . '), LPG - ' . $_POST['lpg'] . '(' . $price->getLPG() . ')';
        makeLog($entityManager,'Edycja(ceny)', $description);

        if(!empty($_POST['pb98'])) $price->setPB98($_POST['pb98']);
        else $price->setPB98("");
        if(!empty($_POST['pb95'])) $price->setPB95($_POST['pb95']);
        else $price->setPB95("");
        if(!empty($_POST['on'])) $price->setOIL($_POST['on']);
        else $price->setOIL("");
        if(!empty($_POST['lpg'])) $price->setLPG($_POST['lpg']);
        else $price->setLPG("");
        $price->setDateOfChange(date("y-m-d H:i:s"));

        if($_GET['id']==0) $entityManager->persist($price);
        $entityManager->flush();

        alert(1, 'Dane zostały zeedytowane.');
    }
    ?>
    <form action="" method="POST">
        <input type="hidden" name="send" value="1"/>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label><?php echo $user->getName();?> </label>
                </div>
                <div class="form-group">
                    <label>PB98:</label>
                    <input type="number" step="0.01" min="0.0" class="form-control" name="pb98" value="<?php if($price) echo $price->getPB98();?>"/>
                </div>
                <div class="form-group">
                    <label>PB95:</label>
                    <input type="number" step="0.01" min="0.0" class="form-control" name="pb95" value="<?php if($price) echo $price->getPB95();?>"/>
                </div>
                <div class="form-group">
                    <label>ON:</label>
                    <input type="number" step="0.01" min="0.0" class="form-control" name="on" value="<?php if($price) echo $price->getOIL();?>"/>
                </div>
                <div class="form-group">
                    <label>LPG:</label>
                    <input type="number" step="0.01" min="0.0" class="form-control" name="lpg" value="<?php if($price) echo $price->getLPG();?>"/>
                </div>
                <input type="submit" class="btn btn-primary btn-ls" value="Edytuj"/>
                <a href="?page=ourpricesoffuelsales"><button type="button" class="btn btn-primary">Powrót</button></a>
            </div>
        </div>
    </form>
    <?php
}
?>