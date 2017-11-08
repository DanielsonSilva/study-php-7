<?php 

trait Tools
{
	public function rollDice(int $num, int $dice_number)
	{
		$result = 0;
		while ($num > 1) {
			$num = $num - 1;
			$result = $result + rand(1, $dice_number);
		}
		echo "The dices resulted in $result. This was the trait method!" . PHP_EOL;
	}
}