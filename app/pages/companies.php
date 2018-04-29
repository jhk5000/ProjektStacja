<?php



echo '<h2>Firmy współpracujące z naszymi stacjami: </h2>
<hr class="style-one"></hr>';


// pobieranie nazw firm. Trzeba dodać w sprntf by wybierało każda firmę tylko raz

require_once "bootstrap.php";
$companyRepository = $entityManager->getRepository('User');
$companies = $companyRepository->findBy(array('group_id' => '0'));

// Tutaj trzeba uzupełnic funkcje w src/userss.php, tak by wyswietlaja nazwę kazej firmy tylko raz

foreach ($companies as $company) {
echo sprintf("-%s\n", $company->getOursCustomersCompanyName());
}