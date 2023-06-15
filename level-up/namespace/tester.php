<?php
	include_once( 'calculator.php' );

class Calculator {
	
	function add($a, $b) {
		return $a + $b;
	}
	
	function subtract($a, $b) {
		return $a - $b;
	}
	
	function multiply($a, $b) {
		return $a * $b;
	}
	
	function divide($a, $b) {
		return $a / $b;
	}
	
	function remainder($a, $b) {
		return $a % $b;
	}
	
	function average( $a, $b, $c) {
		return ($a + $b + $c) / 3;
	}
}
	
	$numbers = [1, 1, 2, 3, 5, 8, 13];

	$calculator = new calculator\Calculator();
	$calculator2 = new Calculator();
	
	echo '<pre>';
	echo 'Add: ' . $calculator2->add(5, 10) . "\n";
	echo $calculator->add($numbers) . "\n";
	echo 'Subtract: ' . $calculator2->subtract(10, 5) . "\n";
	echo $calculator->subtract(100, $numbers) . "\n";
	echo 'Multiply: ' . $calculator2->multiply(5, 10) . "\n";
	echo $calculator->multiply($numbers) . "\n";
	echo 'Divide: ' . $calculator2->divide(10, 5) . "\n";
	echo $calculator->divide(100, $numbers) . "\n";
	echo 'Modulus: ' . $calculator2->remainder(5, 2) . "\n";
	echo $calculator->remainder(1025, $numbers) . "\n";
	echo 'Average: ' . $calculator2->average(5, 10, 15) . "\n";
	echo $calculator->average($numbers) . "\n";
	echo '</pre>';