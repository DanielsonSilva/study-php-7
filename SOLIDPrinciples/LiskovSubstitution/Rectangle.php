<?php
require_once("IShape.php");

class Rectangle implements IShape
{
	protected $width;
	protected $height;
	
	public function setWidth(float $wid): void
	{
		$this->width = $wid;
	}
	
	public function setHeight(float $hei): void
	{
		$this->height = $hei;
	}
	
	public function getArea(): float
	{
		return ($this->width * $this->height);
	}	
}