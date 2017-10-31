<?php 
require_once("AbstractItem.php");

class Hero
{
	public function useItem($item, int $points, int $duration = null): void
	{
		$item->use($points, $duration);
	}
}