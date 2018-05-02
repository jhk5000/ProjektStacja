<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
//

$companyRepository = $entityManager->getRepository('Companies');
$companies = $companyRepository->findAll();
$l=1;
//$companies = $company->getResult();


$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		    <th width="5%">lp.</th>
			<th width="20%">Nazwa firmy</th>
			<th width="20%">Adres</th>
			<th width="20%">Zniżka</th>
			<th width="5%">Edytuj zniżkę</th>
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
            <td>'.$company->getDiscount().'</td> 
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editdiscount&id='.$company->getCompanyId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                 </center>
            </td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editcompany&id='.$company->getCompanyId().'"><i class=\'glyphicon glyphicon-pencil\'></i></a>                    
                </center>
            </td>
        </tr>
        ';
    $l++;
}//end foreach
echo '</tbody></table>';


