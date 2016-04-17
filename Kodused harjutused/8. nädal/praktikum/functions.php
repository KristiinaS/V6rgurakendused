<?php
$error = "";

function kuva_sisselogimine(){
	global $error;
	if (!empty ($_POST)){
		$kasutaja = htmlspecialchars($_POST['kasutaja']);
		$parool = htmlspecialchars($_POST["parool"]);
		if(!$kasutaja OR !$parool){
			if (!$kasutaja){
				$error.= "Kasutajanimi on vale! <br> \n";
			}
			if (!$parool){
				$error.= "Parool on vale! <br> \n";
			} 
			include("view/sisselogimine.html");
		} else {
			header('Location: ?mode=');
		}
	} else {
		include("view/sisselogimine.html");
	}
}

function kuva_registreerumine(){
	include("view/registreerumine.html");
}

function kuva_yleslaadimine(){
	include("view/yleslaadimine.html");
}

function kuva_pealeht(){
	include("view/index.html");
}
 ?>