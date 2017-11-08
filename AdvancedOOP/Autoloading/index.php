<html>
<head>
<meta charset="UTF-8">
<title>Advanced OOP - Autoloading Example</title>
</head>
<body>
<b>Autoloading</b><br>
<br>
The autoloading feature serves to load class files without the need to declare a lot of <b>require_once</b> statements. 
To achieve this goal, we follow <a href="http://www.php-fig.org/psr/psr-4/">PSR-4 Rules</a> and copy the <a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md">closure function</a> into our application. 
In this function, we change the <i>$prefix</i> and <i>$base_dir</i> accordingly with our project. 
Then create the namespaces and classes with the folders like so:
<xmp>./Dark/Warrior.php
namespace Autoload\Example\Dark;

class Warrior
{
	public function attack($num, $dice)
	{
		echo "This dark warrior caused " . rand(1, $num) * $dice . " points of damage with a blood sword!" . PHP_EOL;
	}
}

./Light/Cleric.php
namespace Autoload\Example\Light;

class Cleric
{
	public function attack($num, $dice)
	{
		echo "This light Cleric caused " . rand(1, $num) * $dice . " points of damage with a blood sword!" . PHP_EOL;
	}
}

Test:
require_once("autoload.php");
$danWar = new \Autoload\Example\Dark\Warrior();
$danCle = new \Autoload\Example\Light\Cleric();
$danWar->attack(3,8);
$danCle->attack(6,4);

Result:
<?php 
require_once("autoload.php");
$danWar = new \Autoload\Example\Dark\Warrior();
$danCle = new \Autoload\Example\Light\Cleric();
$danWar->attack(3,8);
$danCle->attack(6,4);
?></xmp>
So we could use the <b>Warrior</b> and <b>Cleric</b> classes without requiring them through <b>require_once</b> statements.
</body>
</html>





















