<html>
<head>
<meta charset="UTF-8">
<title>Design Patterns - Singleton Example</title>
</head>
<body>
<b>Singleton Design Pattern</b><br>
<br>
Singleton is a bad design pattern that ensure certain class to have only one instance. 
This is a bad design pattern because violates the Single Responsability Principle but sometimes it offers a perfect solution to certain problems. 
Singleton could be implemented in the following way:<br>
<xmp>GroupEvilVillains.php
class GroupEvilVillains
{
	private $hp_doom;
	private $hp_octupus;
	private static $instance;

	public static function new()
	{
		if (!isset(self::$instance)) {
			self::$instance = new GroupEvilVillains();
		}
		
		return self::$instance;
	}
	
	public function showState()
	{
		return "The evil Doom has {$this->hp_doom} points of health and Dr. Octupus has {$this->hp_octupus} points of health." . PHP_EOL;
	}
	
	public function startHp()
	{
		$this->hp_doom = 10;
		$this->hp_octupus = 10;
		echo "The health points was restarted!" . PHP_EOL;
	}
	
	public function attack($evil, $point) {
		switch ($evil) {
			case 1:
				$this->hp_doom -= $point;
				break;
			case 2:
				$this->hp_octupus -= $point;
				break;
			default:
				echo "Evil not found.";
				break;
		}
		return true;
	}
	
	private function __construct() {}
	private function __clone() {}
	private function __sleep() {}
	private function __wakeup() {}
}

Test:
require_once("GroupEvilVillains.php");
$A = GroupEvilVillains::new();
$B = GroupEvilVillains::new();
$A->startHp();
$B->showState();
$B->attack(1,3);
$B->attack(2,7);
$A->showState();
$B->startHp();
$A->showState();

Result:
<?php 
require_once("GroupEvilVillains.php");
$A = GroupEvilVillains::new();
$B = GroupEvilVillains::new();
$A->startHp();
$B->showState();
$B->attack(1,3);
$B->attack(2,7);
$A->showState();
$B->startHp();
$A->showState();
?></xmp>
This shows that, even with two objects (<b>$A</b> and <b>$B</b>), the properties were shared. 
The change of visibility to <i>private</i> of the functions <b>__construct()</b>, <b>__clone()</b>, <b>__sleep()</b> and <b>__wakeup</b> are to prevent the <b>clone</b>, <b>serialize</b> and <b>unserialize</b> functions to copy the objects to another instances.<br>
The right way to apply Singleton Pattern into PHP 7 is using <b>Dependency Injection</b>. This is done by passing the object in the <i>__construct($object)</i> magic method to every class that needs the singleton object. The changes made in one object will reflect in another objects that were constructed with the same object. Let's see some example:<br>
<xmp>ConstantValues.php
class ConstantValues
{
	public function __construct()
	{
		$this->a = 3;
		$this->b = 12;
		$this->c = 43;
		$this->d = 17;
	}
}

DoExpressions.php
class DoExpressions
{
	public function __construct($constants)
	{
		$this->constants = $constants;
	}
	
	public function sum(): int
	{
		$con = $this->constants;
		return ($con->a + $con->b + $con->c + $con->a);
	}
}

DoPhysics.php
class DoPhysics
{
	public function __construct($constants)
	{
		$this->constants = $constants;
	}
	
	public function findDelta(): int
	{
		$con = $this->constants;
		$this->constants->a = 100;
		return (pow($con->b, 2) - 4*$con->a*$con->c);
	}
}



Test:
require_once("ConstantValues.php");
require_once("DoExpressions.php");
require_once("DoPhysics.php");

$constants = new ConstantValues();
$exp = new DoExpressions($constants);
$phy = new DoPhysics($constants);
echo "Do expressions Sum: " . $exp->sum() . PHP_EOL;
echo "Do physics find Delta: " . $phy->findDelta() . PHP_EOL;
echo "Do expressions Sum: " . $exp->sum() . PHP_EOL;

Result:
<?php 
require_once("ConstantValues.php");
require_once("DoExpressions.php");
require_once("DoPhysics.php");

$constants = new ConstantValues();
$exp = new DoExpressions($constants);
$phy = new DoPhysics($constants);
echo "Do expressions Sum: " . $exp->sum() . PHP_EOL;
echo "Do physics find Delta: " . $phy->findDelta() . PHP_EOL;
echo "Do expressions Sum: " . $exp->sum() . PHP_EOL;
?></xmp>
You can observe that the same function <b>$exp->sum()</b> produced different results with a change made in <b>$phy->findDelta()</b>.
</body>
</html>