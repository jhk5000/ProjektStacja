<?php



$company = $entityManager->find('Company', $_GET['id']);
$loged = $entityManager->find('User', $_SESSION['user']);
if($company) {//Do dostosowania!!!
    echo '<h2>Edycja nazwy firmy</h2><hr class="style-one"></hr>';
    if($loged->getGroupId() == 3 || $loged->getGroupId() == 4) {
        if(!empty($_POST['send'])) {
            if(!empty($_POST['name']) && !empty($_POST['id'])) {
                $query = $entityManager->getRepository('User')
                    ->createQueryBuilder()
                    ->where('company != :id')
                    ->setParameter('company', $_POST['company'])
                    ->orderBy('company', 'ASC')
                    ->getQuery();
                $results = $query->getResult();
                if(count($results)) {
                    $user->setCompany($_POST['company']);
                    $entityManager->flush();
                    alert(1, 'Dane zostały zeedytowane.');
                } else {
                    alert(2, 'Błąd!');
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
                        <label><?php echo $company->getCompany();?> </label>
                    </div>
                    <div class="form-group">
                        <label>Nazwa firmy:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $user->getCompany();?>"/>
                    </div>
                    <input type="submit" class="btn btn-primary btn-ls" value="Edytuj"/>
                    <a href="?page=companies"><button type="button" class="btn btn-primary">Powrót</button></a>
                </div>
            </div>
        </form>
        <?php
    }
}
else{
    echo '<h2>Błąd kurłaa</h2><hr class="style-one"></hr>';
}
?>