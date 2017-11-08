<?php 

namespace Dark;

class Mage
{
	public function attack($num, $dice)
	{
		echo "This dark mage caused " . rand(1, $num) * $dice . " points of damage with Fireball!" . PHP_EOL;
	}
}