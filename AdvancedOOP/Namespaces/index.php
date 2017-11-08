<html>
<head>
<meta charset="UTF-8">
<title>Advanced OOP - Namespace Example</title>
</head>
<body>
<b>Namespace</b><br>
<br>
Namespace is used to differentiate classes with the same name. 
This maybe not happen with our classes but, when using third party library, one class can have the same name of a class of our project. 
Namespace resolve this adding more names into your class. 
The classes designed in previous examples always stay in Global namespace. Let's see some example:<br>
<xmp>DarkMage.php
namespace Dark;

class Mage
{
	public function attack($num, $dice)
	{
		echo "This dark mage caused " . rand(1, $num) * $dice . " points of damage with Fireball!" . PHP_EOL;
	}
}

LightMage.php
namespace Light;

class Mage
{
	public function attack($num, $dice)
	{
		echo "This light mage caused " . rand(1, $num) * $dice . " points of damage with Ray of Light!" . PHP_EOL;
	}
}

Test:
require_once("DarkMage.php");
require_once("LightMage.php");
$darkDan = new Dark\Mage();
$lightDan = new Light\Mage();
$darkDan->attack(3, 6);
$lightDan->attack(5, 4);

Result:
<?php 
require_once("DarkMage.php");
require_once("LightMage.php");
$darkDan = new Dark\Mage();
$lightDan = new Light\Mage();
$darkDan->attack(3, 6);
$lightDan->attack(5, 4);
?></xmp>
The creating of the object could start with namespace name first because this file hasn't a namespace yet. 
This means when creating the objects, the namespace path declared is relative. 
Since this file has no namespace, all is treated with global namespace. If namespace is provided, creating of objects have to change to:<br>
<xmp>$darkDan = new \Dark\Mage();
$lightDan = new \Light\Mage();</xmp>
PHP understand with <b>\</b> that is path is not relative, it is global. 
If a namespace is too big or is the same with another file required to create several object, we could use an <i>alias</i>:<br>
<xmp>Test:
use \Dark\Mage as DarkMage;
$darkDan = new DarkMage();
$darkDan->attack(2,8);

Result:
<?php 
use \Dark\Mage as DarkMage;
$darkDan = new DarkMage();
$darkDan->attack(2,8);
?>
</xmp>
</body>
</html>





















