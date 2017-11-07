<?php 

class Hero
{
	static public $difficult;
	public $name;
	
	public function setName($name): void
	{
		$this->name = $name;
		echo "Your name is now $name. You are playing in " . self::$difficult . "." . PHP_EOL;
	}
}