<?php 

class Player
{
	public $name;
	private $saveFile;
	public function setSaveFile($save_path)
	{
		$this->saveFile = $save_path;
	}
	
	public function rollDice(int $num, int $dice_number)
	{
		$result = 0;
		while ($num > 1) {
			$num = $num - 1;
			$result = $result + rand(1, $dice_number);
		}
		echo "The dices resulted in $result. This worked with parent class!" . PHP_EOL;
	}
}