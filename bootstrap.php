<?php
$db = new mysqli('localhost', 'root', getenv('DBPW'), 'factorial');

function calcFac($db, $num) {
	$qString = "Select * from factorial order by number Desc limit 1";
	$result = mysqli_query($db, $qString);
	// $bigKnown = array('number' => 1, 'result' => 1);
	// if (mysqli_num_rows($result) > 0) {
	$bigKnown = mysqli_fetch_assoc($result);
	// } 
	$factorial = $num;
	while (--$num > $bigKnown['number']) { 
		$factorial = gmp_mul($factorial, $num);
	}
	return gmp_strval(gmp_mul($factorial, $bigKnown['result']));
}