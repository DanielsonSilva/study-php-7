<?php 

require_once("CombatMessage.php");
require_once("Tools.php");
require_once("Player.php");

class Hero2 extends Player
{
	use CombatMessage, Tools;
	
	public function showCombatMessage()
	{
		echo "Hero 2 is Awesome! He defeated his foe with one slash of his sword!" . PHP_EOL;
	}
}