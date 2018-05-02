<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
require('../bootstrap.php');
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
        if($user === null || !password_verify($_SESSION['token'], $user->getToken())) {
            session_destroy();
            $_SESSION = array();
            die();
        }
    }
    switch($_POST['task']) {
        case 1:
            if(isset($user)) {
                if (!empty($_POST['name'])) {
                    if ($_POST['pass1'] != $_POST['pass2']) {
                        echo 'Podane hasła nie są identyczne!';
                    } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                        echo 'Podano błędny adres email!';
                    } else {
                        $user = $entityManager->getRepository('User')->findOneBy(array('login' => $_POST['login']));
                        $mail = $entityManager->getRepository('User')->findOneBy(array('mail' => $_POST['mail']));
                        if ($user !== null) {
                            echo 'Podany login jest już zajęty!';
                        } elseif ($mail !== null) {
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
                            $user->setGroupId($_POST['group']);
                            $user->setToken(null);
                            $user->setInfo('');
                            $entityManager->persist($user);
                            $entityManager->flush();

                            $loged = $entityManager->find('User', $_SESSION['user']);
                            $changer = $loged->getUserId() . ', ' . $loged->getLogin() . ', ' . $loged->getName();
                            $description = 'Zarejestrowano użytkownika. ' . 'Login: ' . $_POST['login'] . ', Nazwa: ' . $_POST['name'] . ', E-mail: ' . $_POST['mail'];
                            makeLog($entityManager, 'Rejestracja', $changer, $description);
                            echo 1;
                        }
                    }
                } else {
                    echo 'Uzupełnij wszystkie dane!';
                }
            }else{
                echo 'Zostałeś wylogowany';
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
                $dql = "SELECT l FROM logdata l WHERE l.Users_user_id = ".$user->getUserId()." AND l.valid = 0 ORDER BY l.log_date DESC";
                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(3);
                $logs = $query->getResult();
                if(count($logs)>2){
                    $date1 = $logs[2]->getLogDate();
                    if(compareDates($date1, $logs)>0){
                        echo "Logowanie zablokowane. Następne możliwe logowanie: ";
                        echo date("y-m-d H:i:s", strtotime($date1)+300);
                        exit(1);
                    }
                }
                $password = $user->getPasswd();
                $log = new Logdata();
                $log->setUsersUserId($user->getUserId());
                $log->setLogDate(date("y-m-d H:i:s"));
                if(password_verify($_POST['password'], $password)){
                    $_SESSION['user']  = $user->getUserId();
                    $token = generateToken();
                    $_SESSION['token'] = $token;
                    $token = password_hash($token, PASSWORD_BCRYPT);
                    $user->setToken($token);
                    $entityManager->flush();

                    $log->setValid(1);
                    $entityManager->flush();

                    $description = 'Zalogowano użytkownika. ' .  'Login: ' . $_POST['login'];
                    makeLog($entityManager,'Logowanie(poprawne)', '', $description); $entityManager->persist($log);
                    echo 1;
                }else{
                    $log->setValid(0);
                    $entityManager->persist($log);
                    $entityManager->flush();

                    $description = 'Błędna próba zalogowania. ' .  'Login: ' . $_POST['login'] . ', IP: ' . getIP();
                    makeLog($entityManager,'Logowanie(błędne)', '', $description); $entityManager->persist($log);

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
                echo getRegisterWindow();
            }
            break;
        case 4:
            session_destroy();
            $_SESSION = array();
            echo 1;
            break;
        case 5:
            if(isset($user)) {
                if (!empty($_POST['name'])) {
                    $station = $entityManager->getRepository('Stations')->findOneBy(array('station_name' => $_POST['name']));
                    if ($station !== null) {
                        echo 'Podana nazwa jest już zajęta!';
                    } else {
                        $st = new Stations();
                        $st->setStationName($_POST['name']);
                        $st->setVoivodeship($_POST['voide']);
                        $st->setCity($_POST['city']);
                        $st->setStreet($_POST['street']);
                        $entityManager->persist($st);
                        $entityManager->flush();

                        $loged = $entityManager->find('User', $_SESSION['user']);
                        $changer = $loged->getUserId() . ', ' . $loged->getLogin() . ', ' . $loged->getName();
                        $description = 'Dodano stację. ' . 'Nazwa: ' . $_POST['name'] . ', Adres: ' . $_POST['city'] . ', ' . $_POST['street'] . ', ' . $_POST['voide'];
                        makeLog($entityManager, 'Wprowadzono nową stację', $changer, $description);
                        echo 1;
                    }

                } else {
                    echo 'Uzupełnij wszystkie dane!';
                }
            }else{
                echo 'Zostałeś wylogowany';
            }
            break;
        default:
            break;
    }
}
?>