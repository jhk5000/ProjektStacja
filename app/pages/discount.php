


<h3>Przyznane znizki</h3><hr class="style-one"></hr>

<?php
    use Doctrine\ORM\EntityRepository;

	echo '<h2>zniżki</h2><hr class="style-one"></hr>';

require_once "bootstrap.php";
$dql = "SELECT u.user_id. u.name, d.discount, d.Users_user_id FROM discount d, user u 
        WHERE u.user_id = d.Users_user_id";
$selectedDiscount = $entityManager->createQuery($dql)->getScalarResult();
$l=1;
echo '<table class="table table-bordered table-hover">
		<thead>
		  <tr>
		  <th>lp.</th>			
			<th>Klient</th>
			<th>Wysokość zniżki</th>			
		  </tr>
		</thead>
		<tbody>';
foreach($selectedDiscounts as $discounts) {
    echo sprintf('<tr><td>'.$l. '</td><td>'.$discounts['u.name'].'</td><td>'.$discounts['d.discount'].' </td>
        <td><a href="'.$config['page_url'].'?page=editdiscount&id='.'"><input type="submit" class="btn btn-info btn-xs" value="Edytuj"/></a> 
            <a href="'.$config['page_url'].'?page=deletediscount&option=1&id='.$station['s.station_id'].'">
        <input type="submit" class="btn btn-danger btn-xs" value="Usuń"/></a></td></tr>');
    $l++;
    //echo $myStation['s.name']." has " . $productBug['openBugs'] . " open bugs!\n";
}

echo '</tbody></table>';
echo '<a href="'.$config['page_url'].'?page=discount&option=8&id="><input type="submit" class="btn btn-primary" value="Dodaj żniżkę"/></a>';

?>