<?php 

namespace Light;

class Mage
{
	public function attack($num, $dice)
	{
		echo "This light mage caused " . rand(1, $num) * $dice . " points of damage with Ray of Light!" . PHP_EOL;
	}
}