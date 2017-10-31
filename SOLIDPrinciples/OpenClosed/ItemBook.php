<?php 

require_once("AbstractItem.php");

class ItemBook extends AbstractItem
{
	public function use(int $points, int $duration = null): void
	{
		echo "You have $points Intelligence points for $duration minutes." . PHP_EOL;
	}
}