<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Galerii</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="javascript.js"></script>
	</head>
	<body>
		<h1> Galerii </h1>
		<div id="pictures">
		<?php 
		foreach ($pildid as $pilt) {
		echo('<a href="'.$pilt["big"].'">
			<img src="'.$pilt["small"].'" alt="'.$pilt["alt"].'" 
			onclick="showDetails(this.alt); return false;"></a>');
		}
		?>

		</div>
			
		<div id="hoidja" style="display:none;">
		  <div id="taust"></div>
		  <div id="tabel">
			<div id="cell">
			  <div id="sulge" onclick="hideDetails();">Sulge</div>
			  <div id="sisu">
				<img id="suurpilt" onload="suurus(this)" src="" alt="ajutine"/><br/>
				<span id="inf"></span>
			  </div>
			</div>
		  </div>
		</div>
		
	</body>
</html>