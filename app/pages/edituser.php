<?php
$user = $entityManager->find('User', $_GET['id']);
$loged = $entityManager->find('User', $_SESSION['user']);
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
                    $description = 'Edytowano użytkownika. ' .  'Login: ' . $_POST['login'] . '(' . $user->getLogin() .'), Nazwa: ' . $_POST['name'] . '(' . $user->getName() .'), E-mail: ' . $_POST['mail'] . '(' . $user->getMail() .')';
                    makeLog($entityManager,'Edycja(użytkownik)', $description);

                    $user->setName($_POST['name']);
                    $user->setLogin($_POST['login']);
                    $user->setMail($_POST['mail']);
                    if($_POST['company']==0){
                        $user->setCompaniesCompanyId(null);
                    }else{
                        $user->setCompaniesCompanyId($_POST['company']);
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
                    <label>Firma:</label>
                    <select name="company" class="form-control">
                        <?php
                        $companies = $entityManager->getRepository('Companies')->createQueryBuilder('c')->getQuery()->getResult();
                        if($user->getCompaniesCompanyId() != null){
                            $company = $entityManager->find('Companies', $user->getCompaniesCompanyId());
                            $companies = $entityManager->getRepository('Companies')
                                ->createQueryBuilder('c')
                                ->where('c.company_id != :id')
                                ->setParameter('id', $user->getCompaniesCompanyId())
                                ->getQuery()
                                ->getResult();
                            echo '<option value="'.$company->getCompanyId().'">'.$company->getCompanyName().'</option>';
                            echo '<option value="null"></option>';
                        }else{
                            echo '<option value="null"></option>';
                        }
                        foreach($companies as $cm){
                            echo '<option value="'.$cm->getCompanyId().'">'.$cm->getCompanyName().'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary btn-ls" value="Edytuj"/>
                <a href="?page=customers"><button type="button" class="btn btn-primary">Powrót</button></a>
            </div>
        </div>
    </form>
<?php
    }
}
?>