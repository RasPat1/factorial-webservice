<?php

include 'bootstrap.php';
if (!$db) {
	echo 'dead db';
	die('no db');
}
for ($i = 0; $i < 100000000; $i++) {
	$result = mysqli_query($db, 
	"Select result from factorial where number = $i");
	if (mysqli_num_rows($result) == 0) {
		$newFac = gmp_strval(calc_fac($i));
		echo "$i\n";
		// echo $newFac;
		$qString = "Insert into factorial values ($i, '$newFac')";
		// echo $qString;
		mysqli_query($db, $qString);
	}
}


// Looool Most trivial implementation ever
// Ignores all the important parts abotu factorial
// One the numbers will overflow
// Two don't use inefficient recursive 
// Three not even tail recursive
// Four naive multiplication is slow there are faster ways
// Five the things not even cached! no Memo
// Six half of these answers are already in the db.
// Seven lol catz

function calc_fac($num) {
	$factorial = $num;
	while (--$num > 1) { 
		$factorial = gmp_mul($factorial, $num);
	}
	return $factorial;
}

