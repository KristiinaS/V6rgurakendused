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

function connect_db(){
	global $connection;
	$host="localhost";
	$user="root";
	$pass="root";
	$db="praks11";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function lae_pildid(){
	global $connection;
	$query = 'select * from 10153280_pildid';
	$result = mysqli_query($connection, $query) or die("ei leia tabelit");
	$output = [];
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		array_push($output, $row);
	}
	
	return $output;
}

function pildi_info($id){
	global $connection;
	$query = "select * from 10153280_pildid where id=$id";
	$result = mysqli_query($connection, $query) or die();
	return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

$error = "";

function kuva_sisselogimine(){
	global $error;
	global $connection;
	if (!empty ($_POST)){
		$kasutaja = htmlspecialchars($_POST['kasutaja']);
		$parool = htmlspecialchars($_POST["parool"]);
		if (empty($kasutaja) OR empty($parool)){
			$error.= "Kasutajanimi/parool on puudu! <br> \n";
			include("view/sisselogimine.html");
		} else {
			$parool = sha1($parool);
			$query = "select * from kasutajad where kasutajanimi='$kasutaja' and parool='$parool'";
			$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
			$rows = mysqli_num_rows($result);
			if ($rows){
				$_SESSION['sisselogitud'] = 1;
				$_SESSION['teade'] = "Sisselogimine õnnestus!";
				$_SESSION['kasutaja'] = $kasutaja;
				$value = mysqli_fetch_object($result);
				$_SESSION['id'] = $value->id;
				header('Location: ?mode=galerii');
			} else {
				$error.= "Kasutajanimi/parool on vale! <br> \n";
				include("view/sisselogimine.html");
			}
		}
	} else {
		include("view/sisselogimine.html");
	}
}

function kuva_registreerumine(){
	include("view/registreerumine.html");
}

function kuva_pildivorm(){
	global $error;
	global $connection;
	if (isset($_SESSION['sisselogitud'])) {
		include("view/pildivorm.html");
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

function upload($name, $loc){
  $allowedExts = array("jpg", "jpeg", "gif", "png");
  $allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
  $exploded=explode(".", $_FILES[$name]["name"]);
  $extension = end($exploded);

  if ( in_array($_FILES[$name]["type"], $allowedTypes)
   && ($_FILES[$name]["size"] < 100000) // see on 100kb
   && in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
    if ($_FILES[$name]["error"] > 0) {
      return "";
    } else {
      // vigu ei ole
      if (file_exists($loc."/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
        return $_FILES[$name]["name"];
      } else {
        // kõik ok, aseta pilt
        move_uploaded_file($_FILES[$name]["tmp_name"], $loc."/" . $_FILES[$name]["name"]);
        return $_FILES[$name]["name"];
      }
    }
  } else {
    return "";
  }
}

function logout() {
	lopeta_sessioon();
	header('Location: ?mode=');
}
 ?>
