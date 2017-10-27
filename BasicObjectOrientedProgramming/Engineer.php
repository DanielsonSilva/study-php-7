<?php 
require_once("Person.php");

class Engineer extends Person
{
	public function __construct($example)
	{
		parent::__construct($example);
	}
	
	public function __destruct()
	{
		echo "An engineer named " . $this->name . " was destroyed!" . PHP_EOL;
	}
	
	public function setDimensions(float $hei, float $wei): void
	{
		$this->height = $hei;
		$this->weight = $wei;
	}
	
	public function displayDimensions(): string
	{
		$dimensionString = "This engineer is " . $this->height . " tall";
		$dimensionString .= " and weigth " . $this->weigth . " pounds." . PHP_EOL;
		return $dimensionString;
	}
	
	public function displayBirthday(): string
	{
		return "This is how to display a birthday: " . $this->getBirthday();
	}
}
