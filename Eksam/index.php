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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
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
		
		<div id="diff">
		</div>
		
	</body>
</html>
