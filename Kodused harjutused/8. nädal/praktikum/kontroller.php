<?php 
include_once("functions.php");

$pildid=array(
  array("big"=>"img/esimene.jpg", "small"=>"thumb/esimene-thumb.jpg", "alt"=>"Esimene"),
  array("big"=>"img/teine.jpg", "small"=>"thumb/teine-thumb.jpg", "alt"=>"Teine"),
  array("big"=>"img/kolmas.jpg", "small"=>"thumb/kolmas-thumb.jpg", "alt"=>"Kolmas"),
  array("big"=>"img/neljas.jpg", "small"=>"thumb/neljas-thumb.jpg", "alt"=>"Neljas")
 );
 
 $mode = "";
 if (isset($_GET['mode'])) {
	$mode = $_GET['mode']; 
 }
 
 include_once("view/head.html");
 switch($mode){
	case 'sisselogimine':
		kuva_sisselogimine();
		break;
	case 'registreerumine':
		kuva_registreerumine();
		break;
	case 'yleslaadimine':
		kuva_yleslaadimine();
		break;
	default:
		kuva_pealeht();
 }
 include_once("view/foot.html");
?>