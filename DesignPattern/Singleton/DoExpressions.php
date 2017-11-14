<?php 

class DoExpressions
{
	public function __construct($constants)
	{
		$this->constants = $constants;
	}
	
	public function sum(): int
	{
		$con = $this->constants;
		return ($con->a + $con->b + $con->c + $con->a);
	}
}