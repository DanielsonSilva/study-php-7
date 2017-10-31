<?php 

require_once("AbstractItem.php");

class ItemPotionStrength extends AbstractItem
{
	public function use(int $points, int $duration = null): void
	{
		echo "You have $points Strength points for $duration minutes." . PHP_EOL;
	}
}