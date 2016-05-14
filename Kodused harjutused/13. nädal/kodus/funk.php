<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="root";
	$pass="root";
	$db="praks11";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	global $connection;
	$errors = [];
	if (isset($_SESSION['user'])){
		header('Location:?page=loomad');
	} else {
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$kasutaja = mysqli_real_escape_string($connection, htmlspecialchars($_POST['user']));
			$parool = mysqli_real_escape_string($connection, htmlspecialchars($_POST['pass']));
			if (empty($kasutaja) OR empty($parool)){
				$error = "Kasutajanimi/parool puudu!";
				array_push($errors,$error);
			} else {
				$parool = sha1($parool);
				$query = "select * from kylastajad where username='$kasutaja' and passw='$parool'";
				$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
				$rows = mysqli_num_rows($result);
				if ($rows) {
					$_SESSION['user'] = $kasutaja;
					header('Location:?page=loomad');
				}
			} 
		}
	}

	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	if (!isset($_SESSION['user'])){
		header('Location:?page=login');
	}
	global $connection;
	$unikaalsed_puurid=mysqli_query($connection, "select distinct(puur) from 10153280_loomaaed") or die("Päring ebaõnnestus - ".mysqli_error($connection));
	while($puur=mysqli_fetch_array($unikaalsed_puurid, MYSQLI_NUM)) {
		$loomad_puuris=mysqli_query($connection, "select * from 10153280_loomaaed where puur={$puur[0]}");
		$puurid[$puur[0]]=[];
		while($loom=mysqli_fetch_array($loomad_puuris, MYSQLI_ASSOC)) {
			array_push($puurid[$puur[0]], $loom);
		}
	}
//	print_r($puurid);
	include_once('views/puurid.html');
	
}

function lisa(){
	$errors = [];
	global $connection;
	if (!isset($_SESSION['user'])) {
		$error = "Piltide lisamiseks logi sisse!";
		array_push($errors, $error);
		header('Location:?page=login');
	} else {
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$nimi = mysqli_real_escape_string($connection, htmlspecialchars($_POST['nimi']));
			$puur = mysqli_real_escape_string($connection, htmlspecialchars($_POST['puur']));
			$liik = upload('liik');
			if (empty($nimi) OR empty($puur) OR empty($liik)) {
				$error = "Nimi/puur/fail on puudu!";
				array_push($errors,$error);
			} else {
				$query = "insert into 10153280_loomaaed(nimi,puur,liik) values ('$nimi','$puur','$liik')";
				mysqli_query($connection,$query) or die("$query - ".mysqli_error($connection));
				if (mysqli_insert_id($connection) > 0) {
					header('Location:?page=loomad');
				}
			}
		}
	}
	
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$exploded = explode(".", $_FILES[$name]["name"]);
	$extension = end($exploded);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 1000000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>
