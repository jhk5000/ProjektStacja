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
			<th width="20%">Nazwa firmy</th>
			<th width="20%">Adres</th>
			<th width="8%">Zniżka</th>
			<th width="12%">Ustaw zniżkę</th>
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
            <td>'.$company->getDiscount().'%</td>
            <td>            
            <select  name="discount">';
    //nie pobiera tez przez id="discount" ???
                for ($i = 0; $i <= 100; $i = $i+5) {
                    echo('<option value="'.$i.'">'.$i.'%</option>');
                }
            echo'</select>            
             <a href="javascript://" title=\'<center>Czy napewno ustawić zniżkę: '.$_POST['discount'].'?</center>\' data-placement="bottom" data-html=\'true\' data-toggle="popover" data-trigger="focus" 
             data-content="
                <form method=\'post\' enctype=\'multipart/form-data\' action=\'\'>
                    <div class=\'form-group\'>
                        <center><input type=\'hidden\' name=\'id\' value=\''.$company->getCompanyId().'\'>
                        <button type=\'submit\' name=\'selectDiscount\' class=\'btn btn-success\'>Tak</button> 
                        <button type=\'button\' class=\'btn btn-danger\' data-dismiss=\'modal\'>Nie</button>
                        </center>
                    </div>
                </form>">
                    <i class=\'btn btn-primary btn-sm\'>Ustaw</i></a>
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

if(isset($_POST['selectDiscount'])){
    $selected = $entityManager->find('Companies', $_POST['id']);
    $selected->setDiscount($_POST['discount']);
    $entityManager->flush();
    echo '<script type="text/javascript">
            window.location.href="'.$config['page_url'].'?page=companies";
          </script>';
}


