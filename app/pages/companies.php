<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
//

$company = $entityManager->getRepository('Companies')
    ->createQueryBuilder()
    ->select('company_name, company_id, discount')
    ->getQuery();
$companies = $company->getResult();


$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		    <th width="5%">lp.</th>
			<th width="20%">Nazwa firmy</th>
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
            <td>'.$company['company_name'].'</td>            
            <td>'.$company['discount'].'</td> 
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editdiscount&id='.$company['company_id'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                 </center>
            </td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editcompany&id='.$company['company_id'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a>                    
                </center>
            </td>
        </tr>
        ';
    $l++;
}//end foreach
echo '</tbody></table>';


