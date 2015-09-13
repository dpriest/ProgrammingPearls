<?php
function sorted($x, $n) {
	for ($i=0; $i < $n -1; $i++) { 
		if ($x[$i] > $x[$i+1])
			return 0;
	}
	return 1;
}
function binarysearch($x, $n, $t) {
	$l = 0;
	$u = $n - 1;
	$size = $n + 1;
	while ($l <= $u) {
		$oldsize = $size;
		$size = $u - $l +1;
		assert($size < $oldsize);
		$m = (int)(($l + $u) /2);
		if ($x[$m] < $t)
			$l = $m+1;
		else if ($x[$m] == $t) {
			assert(0 <= $m && $m < $n && $x[$m] == $t);
			return $m;
		}
		else
			$u = $m-1;
	}
	if ($u > 0) {
		assert($x[$u] < $t);
	}
	if ($u+1 < $n) {
		assert($x[$u+1] > $t);
	}
	return -1;
}
$n = $_SERVER['argv'][1];
$t = $_SERVER['argv'][2];
for ($i=0; $i < $n; $i++) { 
	$x[$i] = 10 * $i;
}
assert(sorted($x, $n));
printf(" %d\n", binarysearch($x, $n, $t));