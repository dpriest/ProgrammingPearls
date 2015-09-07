<?php
$income = $_SERVER['argv'][1];
$base = 2200;
$step = 500;
$percentStep = 0.01;
$tax = 0;
$startPercent = 0.13;
while($income > $base) {
	$level = ceil(($income - $base) / $step);
	$tax += ($level * $percentStep + $startPercent) * ($income - ($base + ($level-1) * $step));
	$income -= ($income - $base - ($level-1) * $step);
}
echo $tax;