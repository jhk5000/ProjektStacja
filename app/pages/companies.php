<?php
echo '<h2>Nasi klienci:</h2><hr class="style-one"></hr>';
require_once "bootstrap.php";
//pobranie wszystkich firm uzytkownikow z bazy
// potrzeba to zrobic tak by pobierało także znizkę dla firmy i by można było zmienic nazwę firmy wszystich użytkowników o danym id

//$userRepository = $entityManager->getRepository('User');
//$user = $userRepository->findBy(array('group_id' => '1'));



$company = $entityManager->getRepository('User')
    ->createQueryBuilder('u')
    ->select('u.company')
    ->where('u.group_id=1')
    ->distinct()
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
			<th width="5%">Edytuj nazwę firmy</th>
		  </tr>
		</thead>
		<tbody>';
foreach ($companies as $company) {
    echo '
        <tr>
            <td>'.$l. '</td>
            <td>'.$company['company'].'</td>            
            <td> </td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editdiscount&id='.$company['company'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a> 
                 </center>
            </td>
            <td>
                <center>
                    <a href="'.$config['page_url'].'?page=editcompany&id='.$company['company'].'"><i class=\'glyphicon glyphicon-pencil\'></i></a>                    
                </center>
            </td>
        </tr>
        ';
    $l++;
}//end foreach
echo '</tbody></table>';


