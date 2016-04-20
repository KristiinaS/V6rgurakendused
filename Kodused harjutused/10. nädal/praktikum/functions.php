<?php
function alusta_sessioon(){
	// siin ees võiks muuta ka sessiooni kehtivusaega, aga see pole hetkel tähtis
	session_start();
	}
	
function lopeta_sessioon(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
}

$error = "";

function kuva_sisselogimine(){
	global $error;
	if (!empty ($_POST)){
		$kasutaja = htmlspecialchars($_POST['kasutaja']);
		$parool = htmlspecialchars($_POST["parool"]);
		if($kasutaja != "kasutaja" OR $parool != "parool"){
			if (!$kasutaja OR !$parool){
				$error.= "Kasutajanimi/parool on puudu! <br> \n";
			} else {
				$error.= "Kasutajanimi/parool on vale! <br> \n";
			}
			include("view/sisselogimine.html");
		} else {
			$_SESSION['sisselogitud'] = 1;
			$_SESSION['teade'] = "Sisselogimine õnnestus!";
			header('Location: ?mode=galerii');
		}
	} else {
		include("view/sisselogimine.html");
	}
}

function kuva_registreerumine(){
	include("view/registreerumine.html");
}

function kuva_yleslaadimine(){
	if (isset($_SESSION['sisselogitud'])) {
		include("view/yleslaadimine.html");
	} else {
		$_SESSION['teade'] = "Piltide lisamiseks logi sisse!";
		header('Location: ?mode=');
	}
	
}

function kuva_pealeht(){
	include("view/index.html");
}

function kuva_galerii() {
	global $pildid;
	if (isset($_SESSION['sisselogitud'])) {
		include("view/galerii.html");
	} else {
		$_SESSION['teade'] = "Galerii vaatamiseks logi sisse!";
		header('Location: ?mode=');
	}
	
}

function logout() {
	lopeta_sessioon();
	header('Location: ?mode=');
}
 ?>