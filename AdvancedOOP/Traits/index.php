<html>
<head>
<meta charset="UTF-8">
<title>Advanced OOP - Traits Example</title>
</head>
<body>
<b>Traits</b><br>
<br>
Traits is a collection of methods that can be used by several classes. Those methods will stay as if they were from that class.<br>
Let's see some example of a trait:<br>
<xmp>CombatMessage.php
trait CombatMessage
{
	public function showCombatMessage()
	{
		echo "This " . get_class($this) . " is attacking for " . rand(1, rand(3, 6)) * 6 . " of damage!" . PHP_EOL;
	}
	
	public function showReceivedDamage()
	{
		echo "This " . get_class($this) . " received " . rand(1, rand(2,4)) * 6 . " points of damage!" . PHP_EOL;
	}
}

Hero1.php
require_once("CombatMessage.php");

class Hero1
{
	use CombatMessage;
}

Test:
require_once("Hero1.php");
$dan = new Hero1();
$dan->showCombatMessage();
$dan->showReceivedDamage();

Result:
<?php 
require_once("Hero1.php");
$dan = new Hero1();
$dan->showCombatMessage();
$dan->showReceivedDamage();
?></xmp>
With this feature, presented first on PHP 5.4, a class can use several traits to use their functions. 
If a declared function within the class has the same name of the trait's method, the function called will be the class one. 
If a declared function within the parent class has the same name of the trait's method, the function called will be the trait one. 
So, if method's names are the same, the PHP will search for the class one, then the trait one, then the parent class one.<br>
Example for this:<br> 
<xmp>Player.php
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

CombatMessage.php
trait CombatMessage
{
	public function showCombatMessage()
	{
		echo "This " . get_class($this) . " is attacking for " . rand(1, rand(3, 6)) * 6 . " of damage!" . PHP_EOL;
	}
	
	public function showReceivedDamage()
	{
		echo "This " . get_class($this) . " received " . rand(1, rand(2,4)) * 6 . " points of damage!" . PHP_EOL;
	}
}

Tools.php
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

Hero2.php
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

Test:
unset($dan);
require_once("Hero2.php");
$dan = new Hero2();
$dan->showCombatMessage();
$dan->showReceivedDamage();
$dan->rollDice(3, 6);

Result:
<?php 
unset($dan);
require_once("Hero2.php");
$dan = new Hero2();
$dan->showCombatMessage();
$dan->showReceivedDamage();
$dan->rollDice(3, 6);
?></xmp>
With the methods <i>showCombatMessage</i>, <i>showReceivedDamage</i> and <i>rollDice</i> we could observe how the name conflicts are resolved. 
This example shown how to use two traits at the same time. 
For least, the traits could have same name methods. If this is true, the class that use the traits MUST declare which one will use. 
The visibility could be changed in the <b>use</b> statement too. 
You could observe that a public trait function can't be called because in <b>Hero3</b> we defined that <i>showCombatMessage</i> was private, so the PHP raise a <i>Fatal error</i>. 
Let's see one example:<br>
<xmp>CombatMessage.php
trait CombatMessage
{
	public function showCombatMessage()
	{
		echo "This " . get_class($this) . " is attacking for " . rand(1, rand(3, 6)) * 6 . " of damage!" . PHP_EOL;
	}
	
	public function showReceivedDamage()
	{
		echo "This " . get_class($this) . " received " . rand(1, rand(2,4)) * 6 . " points of damage!" . PHP_EOL;
	}
	
	public function showJourney()
	{
		echo "This " . get_class($this) . " is travelling with its eyes wide open!" . PHP_EOL;
	}
}

JourneyMessage.php
trait JourneyMessage
{
	public function showJourney()
	{
		echo "This " . get_class($this) . " is jounrey calmly..." . PHP_EOL;
	}
}

Hero3.php
require_once("CombatMessage.php");
require_once("JourneyMessage.php");

class Hero3
{
	use CombatMessage, JourneyMessage {
		JourneyMessage::showJourney insteadof CombatMessage;
		CombatMessage::showCombatMessage as private;
	}
	
	public function showMessage()
	{
		$this->showCombatMessage();
	}
}

Test:
unset($dan);
require_once("Hero3.php");
$dan = new Hero3();
$dan->showJourney();
$dan->showMessage();
$dan->showCombatMessage();

Result:
<?php 
unset($dan);
require_once("Hero3.php");
$dan = new Hero3();
$dan->showJourney();
$dan->showMessage();
$dan->showCombatMessage();
?></xmp>
</body>
</html>





















