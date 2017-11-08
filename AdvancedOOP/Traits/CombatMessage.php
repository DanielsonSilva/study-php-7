<?php 

trait CombatMessage
{
	public function showCombatMessage()
	{
		echo "This " . get_class($this) . " is attacking for " . rand(1, rand(3, 6)) * 6 . " of damage!" . PHP_EOL;
	}
	
	public function showReceivedDamage()
	{
		echo "This " . get_class($this) . " received " . rand(1, rand(2,4)) * 6 . " points of damage!" . PHP_EOL;
	}
	
	public function showJourney()
	{
		echo "This " . get_class($this) . " is travelling with its eyes wide open!" . PHP_EOL;
	}
}