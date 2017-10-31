<?php 

require_once("AbstractItem.php");

class ItemHeal extends AbstractItem
{
	public function use(int $points, int $duration = null): void
	{
		echo "You've gained $points hit points." . PHP_EOL;
	}
}