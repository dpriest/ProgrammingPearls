<?php
$n = 10;
$x = Array
(
    0 => 5,
    1 => 4,
    2 => 3,
    3 => 8,
    4 => 3,
    5 => 7,
    6 => 8,
    7 => 3,
    8 => 7,
    9 => 4,
);

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
function bin_search_first($n, $a, $start, $end) {
	if ($start > $end) {
		return 9999;
	}
	$middle = floor(($end + $start)/2);
	if ($a[$middle] > $n) {
		return bin_search_first($n ,$a, $start, $middle -1 );
	} else if ($a[$middle] < $n){
		return bin_search_first($n ,$a, $middle+1, $end);
	} else {
		return min(bin_search_first($n, $a, $start, $middle -1), $middle);
	}
}
$result = bin_search_first($search, $x, 0, count($x) -1);
var_dump($x, $result);





