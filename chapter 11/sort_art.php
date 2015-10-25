<?php
class SortAlgorithm {
	protected $_data;

	public function setData($data) {
		$this->_data = $data;
	}

	public function getData() {
		return $this->_data;
	}

	public function isort3() {
		$x = $this->_data;
		for ($i=1; $i < count($x); $i++) { 
			$t = $x[$i];
			for ($j=$i; $j > 0 && $x[$j-1] > $t; $j--) { 
				$x[$j] = $x[$j-1];
			}
			$x[$j] = $t;
		}
		return $x;
	}

	/**
	 * 慢版，由于需要递归地赋值x变量，所以很慢
	 * @param  [type] $l [description]
	 * @param  [type] $u [description]
	 * @param  [type] $x [description]
	 * @return [type]    [description]
	 */
	public function qsort_slow($l, $u, $x) {
		if ($l >= $u) 
			return $x;
		$m = $l;
		for ($i=$l+1; $i <= $u; $i++) { 
			if ($x[$i] < $x[$l])
				list($x[$m], $x[$i]) = array($x[$i], $x[++$m]);
		}
		list($x[$l], $x[$m]) = array($x[$m], $x[$l]);
		$x = $this->qsort_slow($l, $m-1, $x);
		$x = $this->qsort_slow($m+1, $u, $x);
		return $x;
	}

	public function qsort1($l, $u) {
		if ($l >= $u) 
			return true;
		$m = $l;
		for ($i=$l+1; $i <= $u; $i++) { 
			if ($this->_data[$i] < $this->_data[$l])
				list($this->_data[$m], $this->_data[$i]) = array($this->_data[$i], $this->_data[++$m]);
		}
		list($this->_data[$l], $this->_data[$m]) = array($this->_data[$m], $this->_data[$l]);
		$this->qsort1($l, $m-1);
		$this->qsort1($m+1, $u);
		return true;
	}
}
$x = Array();
$n = $_SERVER['argv'][1];
for($i = 0; $i < $n; $i ++) {
	$x[] = rand();
}
$algorithmIns = new SortAlgorithm();
$start = time();

$algorithmIns->setData($x);
// $sorted_x = $algorithmIns->isort3();
$used = time() - $start;
$start = time();
echo "isort:{$used}\n";

$algorithmIns->setData($x);
$sorted_x1 = $algorithmIns->qsort1(0, $n -1, $x);
$used = time() - $start;
$start = time();
echo "qsort:{$used}\n";