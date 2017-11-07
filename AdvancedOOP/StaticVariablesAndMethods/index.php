<html>
<head>
<meta charset="UTF-8">
<title>Advanced OOP - Static Variables and Methods Example</title>
</head>
<body>
<b>Static Variables and Methods</b><br>
<br>
Static variables and methods live inside de class, not the object. 
This means that if some static variables changes, this change reflect in all objects of that class. 
In case of a method, the method can't manage any dynamic variable or method of the object.<br>
Let's go to some examples:<br>
<xmp>Hero.php
class Hero
{
	static public $difficult;
	public $name;
	
	public function setName($name): void
	{
		$this->name = $name;
		echo "Your name is now $name. You are playing in " . self::$difficult . "." . PHP_EOL;
	}
}

Test:
require_once("Hero.php");
$player1 = new Hero();
$player2 = new Hero();
Hero::$difficult = "Normal";
$player1::$difficult = "Hard";
$player1->setName("Danielson");
$player2->setName("Juliane");

Result:
<?php 
require_once("Hero.php");
$player1 = new Hero();
$player2 = new Hero();
Hero::$difficult = "Normal";
$player1::$difficult = "Hard";
$player1->setName("Danielson");
$player2->setName("Juliane");
?></xmp>
So, even changing the <i>difficult</i> only for player 1, the Hard difficult has been set to player 2 as well.<br>
For the static method, we can use the following example:<br>
<xmp>MathOperation.php
class MathOperations
{
	static function sum(int $x, int $y): int
	{
		return ($x + $y);
	}
	
	static function factorial(int $x): int
	{
		$result = $x;
		while ($x > 1) {
			$x = $x - 1;
			$result = $result * $x;
		}
		return $result;
	}
}

Test:
require_once("MathOperations.php");
echo MathOperations::sum(3, 4) . PHP_EOL;
$operation = new MathOperations();
echo $operation::factorial(6) . PHP_EOL;
echo MathOperations::factorial(8) . PHP_EOL;

Result:
<?php 
require_once("MathOperations.php");
echo MathOperations::sum(3, 4) . PHP_EOL;
$operation = new MathOperations();
echo $operation::factorial(6) . PHP_EOL;
echo MathOperations::factorial(8) . PHP_EOL;
?></xmp>
The methods do not use any dynamic variable or method, so the PHP do not find errors. 
The methods can be executed through some object or through the class.
</body>
</html>