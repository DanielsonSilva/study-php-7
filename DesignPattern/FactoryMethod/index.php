<html>
<head>
<meta charset="UTF-8">
<title>Design Patterns - Factory Method Example</title>
</head>
<body>
<b>Facotry Design Design Pattern</b><br>
<br>
The Facotry Method serves to produce several objects through only one interface.
It will be most valuable in situations that has several options to create a different objects,
like a <i>switch</i> statement creating a different object in each <i>case</i> statement.
Let's see some example that do not use Factory Method:<br>
<xmp>BadCharacterPlayer.php
abstract class BadCharacterPlayer
{
	private $class;

	public function __construct($c)
	{
		$this->class = $c;
	}

	public function getClass(): string
	{
		return $this->class;
	}
}

BadWarrior.php
require_once("BadCharacterPlayer.php");

class BadWarrior extends BadCharacterPlayer
{
	public function __construct()
	{
		parent::__construct("BadWarrior");
	}
}

BadMage.php
require_once("BadMage.php");

class BadMage extends BadCharacterPlayer
{
	public function __construct()
	{
		parent::__construct("BadMage");
	}
}

Test:
require_once("BadWarrior.php");
require_once("BadMage.php");
$badWarrior = new BadWarrior();
$badMage = new BadMage();
$badWarrior->getClass();
$badMage->getClass();

Result:
<?php
require_once("BadWarrior.php");
require_once("BadMage.php");
$badWarrior = new BadWarrior();
$badMage = new BadMage();
echo $badWarrior->getClass() . PHP_EOL;
echo $badMage->getClass() . PHP_EOL;
?></xmp>
Now, imagine if there were 10 types of class to instantiate: you had to use 10 <b>require_once</b> statements and 10 different constructors.
To solve this problem we can provide only one interface to create several objects. Let's see how it is done:<br>
<xmp>CharacterPlayer.php
require_once("Warrior.php");
require_once("Mage.php");
require_once("Paladin.php");
require_once("Druid.php");

class CharacterPlayer
{
    public static function build($class)
    {
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new Exception("We do not have this class to use.");
        }
    }
}

Warrior.php
class Warrior
{
    public function attack()
    {
        echo "This " . get_class($this) . " caused " . (3 * rand(1,12)) . " points of damage with the double axe." . PHP_EOL;
        return 1;
    }
}

Mage.php
class Mage
{
    public function attack()
    {
        echo "This " . get_class($this) . " caused " . (3 * rand(1,12)) . " points of damage with a fireball." . PHP_EOL;
        return 1;
    }
}

Paladin.php
class Paladin
{
    public function attack()
    {
        echo "This " . get_class($this) . " caused " . (3 * rand(1,12)) . " points of damage with the double-handed sword." . PHP_EOL;
        return 1;
    }
}

Druid.php
class Druid
{
    public function attack()
    {
        echo "This " . get_class($this) . " caused " . (3 * rand(1,12)) . " points of damage with the magic staff." . PHP_EOL;
        return 1;
    }
}

Test:
require_once("CharacterPlayer.php");
$warrior = CharacterPlayer::build("Warrior");
$mage = CharacterPlayer::build("Mage");
$paladin = CharacterPlayer::build("Paladin");
$druid = CharacterPlayer::build("Druid");
$warrior->attack();
$mage->attack();
$paladin->attack();
$druid->attack();

Result:
<?php
require_once("CharacterPlayer.php");
$warrior = CharacterPlayer::build("Warrior");
$mage = CharacterPlayer::build("Mage");
$paladin = CharacterPlayer::build("Paladin");
$druid = CharacterPlayer::build("Druid");
$warrior->attack();
$mage->attack();
$paladin->attack();
$druid->attack();
?></xmp>
With a single static method, called <b>build</b>, the PHP could create several objects with only one <b>require_once</b> statement.
</body>
</html>
