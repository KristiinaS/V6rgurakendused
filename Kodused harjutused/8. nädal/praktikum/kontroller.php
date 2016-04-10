<?php 
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
		include("view/sisselogimine.html");
		break;
	case 'registreerumine':
		include("view/registreerumine.html");
		break;
	case 'yleslaadimine':
		include("view/yleslaadimine.html");
		break;
	default:
		include("view/index.html");
 }
 include_once("view/foot.html");
?>