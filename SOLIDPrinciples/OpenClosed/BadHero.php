<?php 
require_once("Item.php");
class BadHero
{
	public function useItem($item, int $points, int $duration): void
	{
		$itemAction = new Item();
		$itemReceived = 2;
		switch ($itemReceived) {
			case 1:
				$itemAction->useHeal($points);
				break;
			case 2:
				$itemAction->usePotionOfStrength($points, $duration);
				break;
			case 3:
				$itemAction->useBook($points);
				break;
			default:
				echo "Error: Item not expected";
				break;
		}
	}
}