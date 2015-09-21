<?php
require_once './DataProvider.class.php';
$n = $_SERVER['argv'][1];
$dataIns = new DataProvider();
$x = $dataIns->provide($n);
$algorithmIns = new MaxSumAlgorithm($n, $x);
$start = time();

// $result = $algorithmIns->simpleAlgorithm();
// $used = time() - $start;
// $start = time();
// echo "algorithm 1:{$result}, {$used}\n";

// $result = $algorithmIns->quadraticAlgorithm();
// $used = time() - $start;
// $start = time();
// echo "algorithm 2:{$result}, {$used}\n";

// $result = $algorithmIns->divideConquerAlgorithm(0, $n-1);
// $used = time() - $start;
// $start = time();
// echo "algorithm 3:{$result}, {$used}\n";

$result = $algorithmIns->scanningAlgorithm();
$used = time() - $start;
$start = time();
echo "algorithm 4:{$result}, {$used}\n";


class MaxSumAlgorithm {
	protected $_n;
	protected $_x;

	public function __construct($n, $x) {
		$this->_n = $n;
		$this->_x = $x;
	}

	public function simpleAlgorithm() {
		$maxsofar = 0;
		for ($i=0; $i < $this->_n; $i++) { 
			for ($j=$i; $j < $this->_n; $j++) { 
				$sum = 0;
				for ($k=$i; $k <= $j; $k++) { 
					$sum += $this->_x[$k];
				}
				$maxsofar = max($maxsofar, $sum);
			}
		}
		return $maxsofar;
	}

	public function quadraticAlgorithm() {
		$maxsofar = 0;
		for ($i=0; $i < $this->_n; $i++) { 
			$sum = 0;
			for ($j=$i; $j < $this->_n; $j++) { 
				$sum += $this->_x[$j];
				$maxsofar = max($maxsofar, $sum);
			}
		}
		return $maxsofar;
	}

	public function divideConquerAlgorithm($l, $u) {
		if ($l > $u) {
			return 0;
		}
		if ($l == $u) {
			return max(0, $this->_x[$l]);
		}
		$m = (int)($l+$u)/2;
		$lmax = $sum = 0;
		for ($i=$m; $i >= 0; $i--) { 
			$sum += $this->_x[$i];
			$lmax = max($lmax, $sum);
		}
		$rmax = $sum = 0;
		for ($i=$m+1; $i <= $u; $i++) { 
			$sum += $this->_x[$i];
			$rmax = max($rmax, $sum);
		}
		return max($lmax + $rmax, $this->divideConquerAlgorithm($l, $m), $this->divideConquerAlgorithm($m+1, $u));
	}

	public function scanningAlgorithm() {
		$maxsofar = 0;
		$maxendinghere = 0;
		for ($i=0; $i < $this->_n; $i++) { 
			$maxendinghere = max($maxendinghere + $this->_x[$i], 0);
			$maxsofar = max($maxsofar, $maxendinghere);
		}
		return $maxsofar;
	}
}