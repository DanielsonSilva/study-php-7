<?php 

class Player
{
	public $name;
	private $hp;
	private $strengh;
	private $intelligence;
	
	public function __construct(array $stats)
	{
		$this->name = $stats[0];
		$this->hp = $stats[1];
		$this->strengh = $stats[2];
		$this->intelligence = $stats[3];
		echo "A player called {$this->name} was created!" . PHP_EOL;
	}
	
	public function __destruct()
	{
		echo "The player {$this->name} will be destroyed..." . PHP_EOL;
		unset($this->name);
		unset($this->hp);
		unset($this->strengh);
		unset($this->intelligence);
	}
	
	private function getDamageDealt()
	{
		$dmg = rand(1, $this->strengh) * 6;
		return $dmg;
	}
	
	public function __call($method, $arguments)
	{
		if (in_array($method, array('getDamageDealt'))) {
			return call_user_func_array(array($this, $method), $arguments);
		} else {
			echo "Function not found. Try again." . PHP_EOL;
		}
	}
	
	static private function getDescription(array $stats): void
	{
		$desc = "The player $stats[0] has several stats: ";
		$desc .= "$stats[1] points of Strengh, ";
		$desc .= "$stats[2] points of Intelligence and ";
		$desc .= "$stats[3] of Health points. This is incredible!" . PHP_EOL;
		echo $desc;
	}
	
	static public function __callStatic($method, $arguments)
	{
		if (in_array($method, array('getDescription'))) {
			return call_user_func_array(array('self', $method), $arguments);
		} else {
			echo "Static Function not found. Try again." . PHP_EOL;
		}
	}
	
	public function __get($property)
	{
		if (property_exists($this, $property)) {
			return $this->$property;
		} else {
			echo "Get the value of this property ($property) not found. Try again!" . PHP_EOL;
		}
	}
	
	public function __set($property, $value)
	{
		if (property_exists($this, $property)) {
			$this->$property = $value;
			echo "The property ($property) is set with the value $value." . PHP_EOL;
		} else {
			echo "Set this property ($property) not found. Try again!" . PHP_EOL;
		}
	}
}
