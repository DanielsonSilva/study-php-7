<?php 

class GroupEvilVillains
{
	private $hp_doom;
	private $hp_octupus;
	private static $instance;

	public static function new()
	{
		if (!isset(self::$instance)) {
			self::$instance = new GroupEvilVillains();
		}
		
		return self::$instance;
	}
	
	public function showState()
	{
		echo "The evil Doom has {$this->hp_doom} points of health and Dr. Octupus has {$this->hp_octupus} points of health." . PHP_EOL;
	}
	
	public function startHp()
	{
		$this->hp_doom = 10;
		$this->hp_octupus = 10;
		echo "The health points was restarted!" . PHP_EOL;
	}
	
	public function attack($evil, $point) {
		switch ($evil) {
			case 1:
				$this->hp_doom -= $point;
				echo "Doom has received $point of damage!" . PHP_EOL;
				break;
			case 2:
				$this->hp_octupus -= $point;
				echo "Dr Octupus has received $point of damage!" . PHP_EOL;
				break;
			default:
				echo "Evil not found.";
				break;
		}
		return true;
	}
	
	private function __construct() {}
	private function __clone() {}
	private function __sleep() {}
	private function __wakeup() {}
}
