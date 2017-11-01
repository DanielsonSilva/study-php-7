<?php 
require_once("IShape.php");

class Square implements IShape
{
	protected $side;
	
	public function setSide(float $input_side): void
	{
		$this->side = $input_side;
	}

	public function getArea(): float
	{
		return (pow($this->side,2));
	}
}