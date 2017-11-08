<?php 

trait JourneyMessage
{
	public function showJourney()
	{
		echo "This " . get_class($this) . " is jounrey calmly..." . PHP_EOL;
	}
}