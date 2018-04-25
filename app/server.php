<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors',1);

    require_once('../bootstrap.php');

	require('config.php');
	require('functions.php');

	if(!empty($_POST['task'])) {
		$time_now = time();
		//$db = new DB($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['database']);
		
		if(!empty($_SESSION['user'])) {
			if(empty($_SESSION['token'])) {
				session_destroy();
				$_SESSION = array();
				die();
			}
            $user = $entityManager->find('User', $_SESSION['user']);
			if($user === null || $user->getToken() != $_SESSION['token']) {
				session_destroy();
				$_SESSION = array();
				die();
			}
		}

		switch($_POST['task']) {
			case 1:
				if(!empty($_POST['name'])) {
					if($_POST['pass1'] != $_POST['pass2']) {
						echo 'Podane hasła nie są identyczne!';
					} elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
						echo 'Podano błędny adres email!';
					} else {
//						$check = $db->select_single("SELECT id FROM users WHERE (UPPER(login) = UPPER('".$_POST['login']."')) or (UPPER(mail) = UPPER('".$_POST['mail']."'));");
//						if($check) {
//							echo 'Podany login lub email jest już zajęty!';
                        $user = $entityManager->getRepository('User')->findOneBy(array('login' => $_POST['login']));
                        $mail = $entityManager->getRepository('User')->findOneBy(array('mail' => $_POST['mail']));
                        if ($user !== null) {
                            echo 'Podany login jest już zajęty!';
						} elseif($mail !== null){
                            echo 'Podany mail jest już zajęty!';
                        } else {
							$password = password_hash($_POST['pass1'], PASSWORD_BCRYPT);
                            $data = date("y-m-d");

                            $user = new User();
                            $user->setLogin($_POST['login']);
                            $user->setPasswd($password);
                            $user->setName($_POST['name']);
                            $user->setMail($_POST['mail']);
                            $user->setRegisterDate($data);
//                            $user->setGroupId($_POST['group']);
                            $user->setGroupId('1');
                            $user->setToken('123');
                            $user->setInfo('');

                            $entityManager->persist($user);
                            $entityManager->flush();
                            echo 1;
//							$db->query("INSERT INTO `users` (`login`, `password`, `name`, `lastname`, `mail`, `register_date`, `group_id`, `token`, `subject_ids`, `indeks`) VALUES ('".$_POST['login']."', '".sha1($_POST['pass1'])."', '".$_POST['name']."', '".$_POST['lastname']."', '".$_POST['mail']."', '".$time_now."', '".$_POST['type']."', '".$token."', '".$_POST['subjects']."', '".$_POST['indeks']."');");
						}
					}
				} else {
					echo 'Uzupełnij wszystkie dane!';
				}
				break;
			case 2:
				if(!empty($_POST['login']) && !empty($_POST['password'])) {
                    $login = $_POST['login'];

                    $user = $entityManager->getRepository('User')->findOneBy(array('login' => $login));
//                    $user = $entityManager->find('User', 1);
                    if ($user === null) {
                        echo "Podano nieprawidłowy login!";
                        exit(1);
                    }

                    $password = $user->getPasswd();
                    if(password_verify($_POST['password'], $password)){
                        $_SESSION['user']  = $user->getUserId();
                        $token = generateToken();
                        $_SESSION['token'] = $token;
                        $user->setToken($token);
                        $entityManager->flush();
                        echo 1;
                    }else{
                        echo "Podano nieporawidłowe hasło!";
                    }
				} else {
					echo 'Uzupełnij wszystkie dane!';
				}
				break;
			case 3:
				if ($_POST['window'] == 1) {
					echo getLoginWindow();
				} else if($_POST['window'] == 3) {
					$subjects = $db->select_multi('SELECT * FROM studies');
					echo getSubjectWindow($subjects);
				} else {
//					$subjects    = $db->select_multi('SELECT * FROM studies');
//					$departments = $db->select_multi('SELECT * FROM departments');
					echo getRegisterWindow($subjects, $departments);
				}
				break;
			case 4:
				session_destroy();
				$_SESSION = array();
				echo 1;
				break;
			default:
				break;
		}
	}
?>