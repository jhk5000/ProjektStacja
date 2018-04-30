<?php
$user = $entityManager->find('User', $_GET['id']);
$loged = $entityManager->find('User', $_SESSION['user']);
$manager = $entityManager->getRepository('Managers')->findOneBy(array('Users_user_id' => $_GET['id']));
if($manager){
    $station = $entityManager->find('Stations', $manager->getStationsStationId());
    $stations = $entityManager->getRepository('Stations')
        ->createQueryBuilder('s')
        ->where('s.station_id != :id')
        ->setParameter('id', $station->getStationId())
        ->getQuery()
        ->getResult();
}else{
    $stations = $entityManager->getRepository('Stations')->createQueryBuilder('s')->getQuery()->getResult();
}

if($user) {
    //Do dostosowania!!!
    echo '<h2>Edycja Użytkownika</h2><hr class="style-one"></hr>';
    if($loged->getGroupId() == 3 || $loged->getGroupId() == 4) {
        if(!empty($_POST['send'])) {
            if(!empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['mail'])) {
                $query = $entityManager->getRepository('User')
                    ->createQueryBuilder('u')
                    ->where('u.user_id != :id AND (u.login = :login OR u.mail = :mail)')
                    ->setParameter('id', $_GET['id'])
                    ->setParameter('login', $_POST['login'])
                    ->setParameter('mail', $_POST['mail'])
                    ->orderBy('u.user_id', 'ASC')
                    ->getQuery();
                $results = $query->getResult();
                if(count($results)<1) {
                    $user->setName($_POST['name']);
                    $user->setLogin($_POST['login']);
                    $user->setMail($_POST['mail']);
                    $entityManager->flush();
                    if($manager){
                        if($_POST['station']==""){
                            $deleted = $entityManager->getRepository('Managers')->findOneBy(array('Users_user_id' => $user->getUserId()));
                            $entityManager->remove($deleted);
                            $entityManager->flush();
                        }else{
                            $manager->setStationsStationId($_POST['station']);
                        }
                    }else{
                        $manager = new Managers();
                        $manager->setUsersUserId($user->getUserId());
                        $manager->setStationsStationId($_POST['station']);
                        $entityManager->persist($manager);
                        $entityManager->flush();
                    }
                    $entityManager->flush();
                    alert(1, 'Dane zostały zeedytowane.');
                } else {
                    alert(2, 'Użytkownik z podanym loginem lub mailem już istnieje!');
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
                        <label><?php echo $user->getName();?> </label>
                    </div>
                    <div class="form-group">
                        <label>Imię i Nazwisko:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $user->getName();?>"/>
                    </div>
                    <div class="form-group">
                        <label>Login:</label>
                        <input type="text" class="form-control" name="login" value="<?php echo $user->getLogin();?>"/>
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="text" class="form-control" name="mail" value="<?php echo $user->getMail();?>"/>
                    </div>
                    <div class="form-group">
                        <label>Stacja</label>
                        <select name="station" class="form-control">
                            <?php
                                if($station){
                                    echo '<option value="'.$station->getStationId().'">'.$station->getStationName().'</option>';
                                    echo '<option value=""></option>';
                                }else{
                                    echo '<option value=""></option>';
                                }
                                foreach($stations as $st){
                                    echo '<option value="'.$st->getStationId().'">'.$st->getStationName().'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-ls" value="Edytuj"/>
                    <a href="?page=managers"><button type="button" class="btn btn-primary">Powrót</button></a>
                </div>
            </div>
        </form>
        <?php
    }
}
?>