<?php
require_once "bootstrap.php";
$user = $entityManager->find('User', $_SESSION['user']);

	if($option == 1) {
		echo '<h2>Zmiana Hasła</h2><hr class="style-one"></hr>';
		if(!empty($_POST['send'])) {
			if(!empty($_POST['old']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {
				if($_POST['pass1'] != $_POST['pass2']) {
					alert(2, 'Podane hasła nie są identyczne!');
				} elseif(!password_verify($_POST['old'], $user->getPasswd())) {
					alert(2, 'Stare hasło nie jest prawidłowe!');
				} else {
                    $password = password_hash($_POST['pass1'], PASSWORD_BCRYPT);
                    $user->setPasswd($password);
                    $entityManager->flush();
					alert(1, 'Hasło zostało zmienione!');
				}
			} else {
				alert(2, 'Wypełnij wszystkie pola!');
			}
		}
?>
		<form action="" method="POST">
			<input type=hidden name="send" value="1">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>Stare Hasło:</label>
						<input type="password" name="old" value="" class="form-control">
					</div>
					<div class="form-group">
						<label>Nowe Hasło:</label>
						<input type="password" name="pass1" value="" class="form-control">
					</div>
					<div class="form-group">
						<label>Powtórz Nowe Hasło:</label>
						<input type="password" name="pass2" value="" class="form-control">
					</div>
					<input type="submit" class="btn btn-primary btn-ls" value="Zmień Hasło"/>
				</div>
			</div>
		</form>
<?php
	} else {
		echo '<h2>Moje Konto</h2><hr class="style-one"></hr>';
?>
		<table class="table table-bordered table-hover">
			<tbody>
				<tr><td><strong>Imie i Nazwisko:</strong></td><td><?php echo $user->getName();?></td></tr>
				<tr><td><strong>Data rejestracji:</strong></td><td><?php echo $user->getRegisterDate();?></td></tr>
				<tr><td><strong>Typ konta:</strong></td><td><?php echo $config['account_types'][$user->getGroupId()];?></td></tr>
			</tbody>
		</table>
		<a href="<?php $config['page_url'];?>?page=myaccount&option=1"><input type="submit" class="btn btn-primary btn-ls" value="Zmień Hasło"/></a>
<?php
	}
?>