<?php



$company = $entityManager->find('Companies', $_GET['id']);
$loged = $entityManager->find('User', $_SESSION['user']);
if($company) {//Do dostosowania!!!
    echo '<h2>Edycja nazwy firmy</h2><hr class="style-one"></hr>';
    if($loged->getGroupId() == 3 || $loged->getGroupId() == 4) {
        if(!empty($_POST['send'])) {
            if(!empty($_POST['name']) && !empty($_POST['address'])) {
                $query = $entityManager->getRepository('Companies')
                    ->createQueryBuilder()
                    ->where('company_id != :id AND (company_name = :name OR address = :address)')
                    ->setParameter('id', $_GET['id'])
                    ->setParameter('address', $_POST['address'])
                    ->orderBy('company_id', 'ASC')
                    ->getQuery();
                $results = $query->getResult();
                if(count($results)<1) {
                    $company->setCompanyName($_POST['name']);
                    $company->setAddress($_POST['address']);
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
                        <label><?php echo $company->getCompanyName();?> </label>
                    </div>
                    <div class="form-group">
                        <label>Nazwa firmy:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $company->getCompanyName();?>"/>
                    </div>
                    <div class="form-group">
                        <label>Adres firmy:</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $company->getAddress();?>"/>
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