<?php

include 'bootstrap.php';
if (!$db) {
	echo 'dead db';
	die('no db');
}
addToDb($db, 0);
addToDb($db, 1);
// Change this so that the amount of time to calculate
// new values betwen konwn values is realtivley constant
// for example goign from 10_000 to 10_090 is about 
// the same work as going from 20_000 to 20_010 or something
// Find the realtionship so the amount of calculation 
// time between intervals is constant

// Second thing is add a bit of logic in the 
// retrieval to get the larger value and 
// divide to get the desired one
// for example if searchign for 10_999 and have both 10_000 and
// 11_000 shodul divide from 11_000 to 10_999 not count up
// Find the work balance betweeen gmp multiply and divide and 
// the factorial # of digits growth to be able to 
// specify the boubdary between dividing down and multiplying up
for ($i = 1; $i < 10000; $i++) {
	$num = $i * 1000;
}

function addToDb($db, $num) {
        $result = mysqli_query($db,
	       "Select result from factorial where number = $num");
        if (mysqli_num_rows($result) == 0) {
		$newFac = calc_fac($num, $db);
		$qstring = "Insert into factorial values ($num, '$newFac')";
		mysqli_query($db, $qString);
	}
}


