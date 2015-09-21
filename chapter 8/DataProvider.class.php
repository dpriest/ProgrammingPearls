<?php
class DataProvider {
	public function provide($n) {
		$ret = array();
		for ($i=0; $i < $n; $i++) { 
			$ret[] = rand(-99, 99);
		}
		return $ret;
	}
}