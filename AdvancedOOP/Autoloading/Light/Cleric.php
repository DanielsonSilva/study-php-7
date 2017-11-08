<?php 

namespace Autoload\Example\Light;

class Cleric
{
	public function attack($num, $dice)
	{
		echo "This light Cleric caused " . rand(1, $num) * $dice . " points of damage with a blood sword!" . PHP_EOL;
	}
}