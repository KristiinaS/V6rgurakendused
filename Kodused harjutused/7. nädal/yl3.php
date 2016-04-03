<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style type="text/css">
		  div{
			border: 2px solid lightblue;
			border-radius: 10px;
			font-size: 20px;
			margin: 10px;
			padding: 5px;
			width:fit-content;
		  }
		</style>
	</head>
	<body>
	<?php 
		$koerad= array( 
			array('nimi'=>'Pontu', 'vanus'=>2, 'värvus'=>'must', 'tõug'=>'krants', 'omanik'=>'Juku'), 
			array('nimi'=>'Lontu', 'vanus'=>1, 'värvus'=>'pruun', 'tõug'=>'taksikoer', 'omanik'=>'Juta'),
			array('nimi'=>'Kontu', 'vanus'=>5, 'värvus'=>'musta-pruuni kirju', 'tõug'=>'saksa lambakoer', 'omanik'=>'Mati'),
			array('nimi'=>'Tontu', 'vanus'=>3, 'värvus'=>'sinine', 'tõug'=>'mängukoer', 'omanik'=>'Kati')
		);
		
		foreach ($koerad as $koer){
			include("koer.html");
		}
	?>
	</body>
</html>