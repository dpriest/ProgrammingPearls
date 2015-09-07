<?php
$n = 10;
$x = Array
(
    0 => 15863235,
    1 => 84584604,
    2 => 780856273,
    3 => 880478498,
    4 => 1188547033,
    5 => 1616582147,
    6 => 1846921838,
    7 => 1876052023,
    8 => 1888197947,
    9 => 2019455704,
);
for($i = 0; $i < $n; $i ++) {
	// $x[] = rand();
}

function quick_sort($a) {
	$pre = array();
	$after = array();
	if (count($a) <= 1) {
		return $a;
	}
	foreach ($a as $key => $value) {
		if ($key == 0) {
			continue;
		}
		if ($value > $a[0]) {
			$after[] = $value;
		} else {
			$pre[] = $value;
		}
	}
	return array_merge(quick_sort($pre), array($a[0]), quick_sort($after));
}

$x = quick_sort($x);
$search = $_SERVER['argv'][1];
function bin_search($n, $a, $start, $end) {
	if ($start > $end) {
		return false;
	}
	$middle = floor(($end + $start)/2);
	if ($a[$middle] == $n) {
		return $middle;
	} else if ($a[$middle] > $n) {
		return bin_search($n ,$a, $start, $middle -1 );
	} else {
		return bin_search($n ,$a, $middle+1, $end);
	}
}
$result = bin_search($search, $x, 0, count($x) -1);
var_dump($x, $result);