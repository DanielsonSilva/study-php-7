<?php 

namespace Autoload\Example\Dark;

class Warrior
{
	public function attack($num, $dice)
	{
		echo "This dark warrior caused " . rand(1, $num) * $dice . " points of damage with a blood sword!" . PHP_EOL;
	}
}