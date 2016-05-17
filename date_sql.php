<?php 
	function date2sql($date) {
		preg_match("/([\d]{1,2})\.([\d]{1,2})\.([\d]{2,4})/", $date, $matches);
		return isset($matches[1]) ? fullYear($matches[3], 20) . "-" . nullBefore($matches[2]) . 
			"-" . nullBefore($matches[1]) : FALSE;
	}

	function fullYear($year, $century){
		return preg_match("/^\d{2}$/", $year) ? $century . $year : $year;
	}

	function nullBefore($year) {
		return preg_match("/^\d$/", $year) ? "0" . $year : $year;
	}