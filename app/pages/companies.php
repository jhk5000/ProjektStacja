<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
// Trzeba dokonczyc ustawienie znizki!

$companyRepository = $entityManager->getRepository('Companies');
$companies = $companyRepository->findAll();
$l=1;
//$companies = $company->getResult();


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
                </center>
            </td>
        </tr>
        ';
    $l++;
}//end foreach
echo '</tbody></table>';

if(isset($_POST['selectDiscount'])){
    $selected = $entityManager->find('Companies', $_POST['id']);
    $selected->setDiscount($_POST['discount']);
    $entityManager->flush();
    echo $_POST['id'];
    echo $_POST['discount'];
    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=companies";
          </script>';
}


