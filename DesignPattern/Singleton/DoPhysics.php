<?php 

class DoPhysics
{
	public function __construct($constants)
	{
		$this->constants = $constants;
	}
	
	public function findDelta(): int
	{
		$con = $this->constants;
		$this->constants->a = 100;
		return (pow($con->b, 2) - 4*$con->a*$con->c);
	}
}