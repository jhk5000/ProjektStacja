<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
// Trzeba dokonczyc ustawienie znizki!
$companyRepository = $entityManager->getRepository('Companies');
$companies = $companyRepository->findAll();
$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		    <th width="5%">lp.</th>
			<th width="40%">Nazwa firmy</th>
			<th width="40%">Adres</th>
			<th width="10%">Zniżka</th>
			<th width="5%">Edytuj firmę</th>
		  </tr>
		</thead>
		<tbody>';
foreach ($companies as $company) {
    echo '
        <tr>
            <td>'.$l. '</td>
            <td>'.$company->getCompanyName().'</td>    
            <td>'.$company->getAddress().'</td>
            <td>'.$company->getDiscount().'<td>
                <center>
                    <a href="'.$config['page_url'].'?page=editcompany&id='.$company->getCompanyId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a>                    
                    <a href="javascript://" title=\'<center>Czy napewno chcesz usunąć firmę '.$company->getCompanyName().'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
                    data-content="
                        <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                            <div class=\'form-group\'>
                                <center><input type=\'hidden\' name=\'id\' value=\''.$company->getCompanyId().'\'>
                                    <button type=\'submit\' name=\'deleteCompany\' class=\'btn btn-success\'>Tak</button> 
                                    <button type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'>Nie</button>
                                </center>
                            </div>
                        </form>">
                    <i class=\'glyphicon glyphicon-trash\' style="color: black;"></i></a>
                </center>
            </td>
        </tr>
        ';
    $l++;
}//end foreach
echo '</tbody></table>';
if(isset($_POST['deleteCompany'])){
    $deleted = $entityManager->find('Companies', $_POST['id']);
    $description = 'Usunięto firmę. ' . 'Nazwa: ' . $deleted->getCompanyName() . ', Adres: ' . $deleted->getAddress()  . ', Zniżka' . $deleted->getDiscount();
    makeLog($entityManager, 'Usunięcie(firma)', $description);
    $entityManager->remove($deleted);
    $entityManager->flush();
    $deleted = $entityManager->getRepository('User')->findBy(array('Companies_company_id' => $_POST['id']));
    foreach ($deleted as $del){
        $del->setCompaniesCompanyId(null);
    }
    $entityManager->flush();
    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=companies";
          </script>';
}