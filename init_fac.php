<?php

include 'bootstrap.php';
if (!$db) {
	echo 'dead db';
	die('no db');
}

// Wipe table
// mysqli_query($db, "truncate factorial;");


// Add these known values
// They may fail if the values are already there
// Number should be specified as primary key in schema
addToDb($db, 0, 1);
addToDb($db, 1, 1);

// Change this so that the amount of time to calculate
// new values between known values is relativley constant
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
	// start by intervals of 1_000
	newFac($db, $i * 1000);
}

function newFac($db, $num) {
        $result = mysqli_query($db,
	       "Select result from factorial where number = $num");
        if (mysqli_num_rows($result) == 0) {
		addToDb($db, $num, calcFac($db, $num, calcFac($db, $num)));

	}
}
function addToDb($db, $num, $value) {
	$qString = "Insert into factorial values ($num, '$value')";
	mysqli_query($db, $qString);
}


