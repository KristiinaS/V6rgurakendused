<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>What's the time?</title>
		<script src="script.js"></script> 
		<style type="text/css">
			body {
				text-align:center;
			}
		</style>
	</head>
	<body onload="showLocalTime()">
	
		<h1>Is your time correct? </h1>
		<p>Your local time is:
		<div id="localTime" > </div></p>
		
		<p> Server's time is:
		<div id="serverTime"> 
			<?php 
			echo date("H:i:s");
			?>
		</div></p>
		
		<div>
			<?php
			$localTime = $_COOKIE["localTime"];
			/*echo $localTime;
			echo "-----";
			//echo $_COOKIE["localTime"];
			//echo "-----";*/
			$serverTime = date("H:i:s", time());
			//echo $serverTime;
			$offTime = abs($localTime-$serverTime);
			
			if ($localTime == $serverTime){
				echo "<br>Your time is correct!";
			} else {
				$localTime = strtotime($_COOKIE["localTime"]);
				$serverTime = strtotime(date("H:i:s", time()));
				$offTime > 0;
				echo "<br>The time is off: ";
				echo round(abs($localTime-$serverTime) / 60,2)." minute(s)";
			}
			
			?>
		</div>
		
	</body>
</html>