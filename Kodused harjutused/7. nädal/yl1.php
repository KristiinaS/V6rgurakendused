<?php
$muutuja = "homme tuleb ilus ilm";
$pikkus = strlen($muutuja);

for ($i = 0; $i<$pikkus; $i++) {
	$nr = $pikkus-$i-1;
	echo($muutuja[$nr]);
}
?>
