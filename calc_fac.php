<?php

include 'bootstrap.php';
if (!$db) {
	echo 'dead db';
	die('no db');
}
for ($i = 0; $i < 100; $i++) {
	$result = mysqli_query($db, 
	"Select result from factorial where number = $i");
	if (mysqli_num_rows($result) == 0) {
		$newFac = calc_fac($i, $db);
		echo "$i\n";
		// echo $newFac;
		$qString = "Insert into factorial values ($i, '$newFac')";
		// echo $qString;
		mysqli_query($db, $qString);
	}
}




