<?php
	function alert($type, $text) {
		if($type == 1) {
			echo '<div class="alert alert-success"><strong>Sukces:</strong> '.$text.'</div>';
		} else {
			echo '<div class="alert alert-warning"><strong>Błąd:</strong> '.$text.'</div>';
		}
	}

	function getLoginWindow() {
		global $config;
		return '<div id="loginBox" class="modalWindow">
				<div id="blackX" onClick="app.closeModal();"></div>
				<h2>Logowanie</h2><hr class="style-one"></hr>
				<b>Login:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="login_name" value=""/>
				<b>Hasło:</b> <input onkeypress="app.check_key(event);" type="password" class="form-control" id="login_password" value=""/></br>
				<center><input class="btn btn-primary btn-ls" type="submit" onClick="app.login();" value="Zaloguj"/> 
				<a href="'.$config['page_url'].'?page=lostpassword"><input class="btn btn-info btn-ls" type="submit" value="Przypominj Hasło"/></a></center>
				</div>';
	}

	// To służyło do edytowania tematów prac dyplomowych. Można zmienić na edytowanie np stacji
	function getSubjectWindow($subjects) {
		$output = '<div id="subjectBox" class="modalWindow">
				<div id="blackX" onClick="app.closeModal();"></div>
				<h2>Wybierz Kierunki</h2><hr class="style-one"></hr>
				<div class="row">
				<div class="col-lg-6">';
				if($subjects)
					foreach($subjects as $s)
						$output .= '<input type="checkbox" onChange="app.onSubjectChange('.$s['id'].');" id="subject_'.$s['id'].'" value="0"> '.$s['name'].'<br/>';
				$output .= '</div></div><br/>
				<center><input class="btn btn-primary btn-lg" type="submit" onClick="app.closeModal();" value="Zamknij"/></center>
				</div>';
		return $output;
	}

	// okno rejestracji użytkownika - > zmienić na okno dodawania użytkownika?

	function getRegisterWindow($subjects, $departments) {
		global $config;
		$output = '<div id="registerBox" class="modalWindow">
				<div id="blackX" onClick="app.closeModal();"></div>
				<h2>Rejestracja</h2><hr class="style-one"></hr>
				<div class="row">
				<div class="col-lg-6">
					<b>Login:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="register_login" value=""/>
					<b>Hasło:</b> <input onkeypress="app.check_key(event);" type="password" class="form-control" id="register_pass1" value=""/>
					<b>Powtórz hasło:</b> <input onkeypress="app.check_key(event);" type="password" class="form-control" id="register_pass2" value=""/>
					<b>Email:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="register_mail" value=""/>
				</div>
				<div class="col-lg-6">
				<b>Imię:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="register_name" value=""/>
				<b>Nazwisko:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="register_lastname" value=""/>
				<b>Typ konta:</b> <select id="user_type" onChange="app.userTypeChange();" class="form-control">
				<option value="1">Klient</option>
				<option value="2">Inny typ konta (wymaga potwierdzenia)</option>
				</select>
				
				<div id="student_subject" style="display:block;">
				<b>Kierunek:</b> <select id="subject" class="form-control">';
				if($subjects) {
					foreach($subjects as $s) {
						$output .= '<option value="'.$s['id'].'">'.$s['name'].' ('.$config['studies_types'][$s['type']].')</option>';
					}
				}
				$output .= '</select>
				<b>Numer indeksu:</b> <input onkeypress="app.check_key(event);" type="text" class="form-control" id="indeks" value=""/>
				</div>
				<div id="promoter_subject" style="display:none;">
				<b>Wydział:</b> <select id="p_subject" class="form-control">';
				if($departments) {
					foreach($departments as $s) {
						$output .= '<option value="'.$s['id'].'">'.$s['name'].'</option>';
					}
				}
				$output .= '</select></div>
				</div></div><br/>
				<center><input class="btn btn-primary btn-lg" type="submit" onClick="app.register();" value="Zarejestruj"/></center>
				</div>';
		return $output;
	}
	
	function checkPageAccess($page, $group, $access, $url) {
		if($access[$page])
			foreach($access[$page] as $a)
				if($group == $a)
					return;
		header('Location: '.$url);
	}

	//generowanie tokenu

	function generateToken() {
		$newcode = NULL;
		$acceptedChars = '123456789zxcvbnmasdfghjklqwertyuiop';
		for($i=0; $i < 50; $i++) {
			$cnum[$i] = $acceptedChars{mt_rand(0, 33)};
			$newcode .= $cnum[$i];
		}
		return $newcode;
	}

	//utworzenie menu użytkownika
	
	function getUserMenu($group) {
		global $config;
		global $page;
		//Konfiguracja dla klienta biznesowego
		if($group == 1) {
			if($page == 'myprices')
				echo '<a href="'.$config['page_url'].'?page=myprices" class="list-group-item active">Moje Stacje</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=myprices" class="list-group-item">Moje Stacje</a>';

		}

		// Konfiguracja dla kierownika
		elseif($group == 2) {
			if($page == 'mystation')
				echo '<a href="'.$config['page_url'].'?page=mystation" class="list-group-item active">Moja stacja</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=mystation" class="list-group-item">Moja stacja</a>';
            if ($page == 'discount')
                echo '<a href="' . $config['page_url'] . '?page=discount" class="list-group-item active">Zniżki</a>';
			else
                echo '<a href="' . $config['page_url'] . '?page=discount" class="list-group-item">Zniżki</a>';
		}

		//konfiguracja dla własciciela
		elseif($group == 3) {
			if($page == 'topics')
				echo '<a href="'.$config['page_url'].'?page=topics" class="list-group-item active">Tematy</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=topics" class="list-group-item">Tematy</a>';
			if($page == 'archive')
				echo '<a href="'.$config['page_url'].'?page=archive" class="list-group-item active">Archiwum</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=archive" class="list-group-item">Archiwum</a>';
			if($page == 'promoters')
				echo '<a href="'.$config['page_url'].'?page=promoters" class="list-group-item active">Dydaktycy</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=promoters" class="list-group-item">Dydaktycy</a>';
			if($page == 'students')
				echo '<a href="'.$config['page_url'].'?page=students" class="list-group-item active">Studenci</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=students" class="list-group-item">Studenci</a>';
			if($page == 'groups')
				echo '<a href="'.$config['page_url'].'?page=groups" class="list-group-item active">Grupy</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=groups" class="list-group-item">Grupy</a>';
			if($page == 'departments')
				echo '<a href="'.$config['page_url'].'?page=departments" class="list-group-item active">Wydziały</a>';
			else
				echo '<a href="'.$config['page_url'].'?page=departments" class="list-group-item">Wydziały</a>';
		}

		//Konfiguracja dla administratora
        elseif($group == 4) {
            if ($page == 'companies')
                echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item active">Klienci (firmy)</a>';
            else
                echo '<a href="' . $config['page_url'] . '?page=companies" class="list-group-item">Klienci (firmy)</a>';
            if ($page == 'customers')
                echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item active">Konta klientów</a>';
            else
                echo '<a href="' . $config['page_url'] . '?page=customers" class="list-group-item">Konta klientów</a>';
            if ($page == 'discount')
                echo '<a href="' . $config['page_url'] . '?page=discount" class="list-group-item active">Zniżki</a>';
            else
                echo '<a href="' . $config['page_url'] . '?page=discount" class="list-group-item">Zniżki</a>';
            if ($page == 'editusers')
                echo '<a href="' . $config['page_url'] . '?page=editusers" class="list-group-item active">Zarządzaj użytkownikami</a>';
            else
                echo '<a href="' . $config['page_url'] . '?page=editusers" class="list-group-item">Zarządzaj użytkownikami</a>';
            if ($page == 'managers')
                echo '<a href="' . $config['page_url'] . '?page=managers" class="list-group-item active">Kierownictwo</a>';
            else
                echo '<a href="' . $config['page_url'] . '?page=managers" class="list-group-item">Kierwonictwo</a>';
            if ($page == 'stations')
                echo '<a href="' . $config['page_url'] . '?page=stations" class="list-group-item active">Stacje</a>';
            else
                echo '<a href="' . $config['page_url'] . '?page=stations" class="list-group-item">Stacje</a>';
        }
		if($page == 'messages')
			echo '<a href="'.$config['page_url'].'?page=messages" class="list-group-item active">Wiadomości</a>';
		else
			echo '<a href="'.$config['page_url'].'?page=messages" class="list-group-item">Wiadomości</a>';
	}


	// pobieranie imienia i nazwiska

function getName(array $array) {
	$string = '';
	if (empty($array['name']) === false && $array['name'] !== null) {
		$string .= $array['name'];
	}//end if

	if (empty($array['lastname']) === false && $array['lastname'] !== null) {
		$string .= ' '.$array['lastname'];
	}//end if

	return trim($string);
}