<?php	echo '<h2>Witaj!</h2><hr class="style-one"></hr>';	//wyswietlanie komunikatów na stronie głownej użytkownika	if(!empty($user)) {	    //Uzytkownik to administrator		if($user->getGroupId() == 4) {			if($option == 1) {			    // czynnosci przy opcji nr 1			} else if ($option == 2) {                // czynnosci przy opcji nr 2			}			//uzytkownik to wlasciciel		}elseif($user->getGroupId() == 3) {            if($option == 3) {                // czynnosci przy opcji nr 3            } elseif($option == 4) {                // czynnosci przy opcji nr 4            }            //uzytkownik to kierownik        }elseif($user->getGroupId() == 2) {			if($option == 3) {                // czynnosci przy opcji nr 3			} elseif($option == 4) {                // czynnosci przy opcji nr 4			}			//uzytkownik to klient		} elseif($user->getGroupId() == 1) {        echo 'Drogi kliencie!<br>';        echo 'Dziś promocja w ...<br>';        echo 'Zapraszamy na nasze stacje!';		}	}?>