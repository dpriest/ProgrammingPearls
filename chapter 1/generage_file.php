<?php
$loop = 10000000;
$numLogs = array();
do {
	$num = rand(1000000, 9999999);
	if (!$numLogs[$num]) {
		echo "{$num}\n";
		$numLogs[$num] = true;
	}
	$loop--;
} while($loop > 0);