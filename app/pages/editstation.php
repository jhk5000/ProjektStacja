<?php
$station = $entityManager->find('Stations', $_GET['id']);
$loged = $entityManager->find('User', $_SESSION['user']);
if($station) {
    //Do dostosowania!!!
    echo '<h2>Edycja Stacji</h2><hr class="style-one"></hr>';
    if($loged->getGroupId() == 3 || $loged->getGroupId() == 4) {
        if(!empty($_POST['send'])) {
            if(!empty($_POST['name']) && !empty($_POST['voivodeship']) && !empty($_POST['city']) && !empty($_POST['street'])) {
                $query = $entityManager->getRepository('Stations')
                    ->createQueryBuilder('s')
                    ->where('s.station_id != :id AND (s.voivodeship = :voivodeship OR s.city = :city OR s.street = :street)')
                    ->setParameter('id', $_GET['id'])
                    ->setParameter('voivodeship', $_POST['voivodeship'])
                    ->setParameter('city', $_POST['city'])
                    ->setParameter('street', $_POST['street'])
                    ->orderBy('s.station_id', 'ASC')
                    ->getQuery();
                $results = $query->getResult();
                if(count($results)<1) {
                    $station->setName($_POST['name']);
                    $station->setVoivodeship($_POST['voivodeship']);
                    $station->setCity($_POST['city']);
                    $station->setStreet($_POST['street']);
                    $entityManager->flush();
                    alert(1, 'Dane zostały zeedytowane.');
                } else {
                    alert(2, 'Stacja z podana nazwą lub adresem już istnieje!');
                }
            } else {
                alert(2, 'Wypełnij wszystkie pola!');
            }
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" name="send" value="1"/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label><?php echo $station->getName();?> </label>
                    </div>
                    <div class="form-group">
                        <label>Nazwa:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $station->getName();?>"/>
                    </div>
                    <div class="form-group">
                        <label>Województwo</label>
                        <input type="text" class="form-control" name="voivodeship" value="<?php echo $station->getVoivodeship();?>"/>
                    </div>
                    <div class="form-group">
                        <label>Miasto</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $station->getCity();?>"/>
                    </div>
                    <div class="form-group">
                        <label>Ulica</label>
                        <input type="text" class="form-control" name="street" value="<?php echo $station->getStreet();?>"/>
                    </div>
                    <input type="submit" class="btn btn-primary btn-ls" value="Edytuj"/>
                    <a href="?page=stations"><button type="button" class="btn btn-primary">Powrót</button></a>
                </div>
            </div>
        </form>
        <?php
    }
}
?>