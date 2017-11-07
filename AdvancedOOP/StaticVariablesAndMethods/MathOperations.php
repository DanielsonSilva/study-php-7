<?php 

class MathOperations
{
	static function sum(int $x, int $y): int
	{
		return ($x + $y);
	}
	
	static function factorial(int $x): int
	{
		$result = $x;
		while ($x > 1) {
			$x = $x - 1;
			$result = $result * $x;
		}
		return $result;
	}
}