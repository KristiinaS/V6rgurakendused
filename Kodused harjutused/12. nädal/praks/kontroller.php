<?php 
ini_set('display_errors', 'on');
include_once("functions.php");
alusta_sessioon();
connect_db();

$pildid = lae_pildid();
 
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
	case 'pildivorm':
		kuva_pildivorm();
		break;
	case 'galerii':
		kuva_galerii();
		break;
	case 'logout':
		logout();
		break;
	default:
		kuva_pealeht();
}
include_once("view/foot.html");
?>
