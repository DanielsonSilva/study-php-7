<html>
<head>
<meta charset="UTF-8">
<title>Advanced OOP - Magic Methods Example</title>
</head>
<body>
<b>Magic Methods</b><br>
<br>
Magic Methods are methods that starts with double underscore (<b>__</b>). 
Those methods exist in every class and are executed when certain actions occur. 
An example of this magic methods already seen is <b>__construct()</b> and <b>__destruct()</b>, which serves to manage operations os object construction and object destruction.<br>
Other methods are: <b>__call()</b>, <b>__calStatic()</b>, <b>__set()</b> and <b>__get()</b>. 
The <b>__set()</b> and <b>__get()</b> functions take action when some property that is getting or setting the value isn't found or doesn't have the <i>public</i> visibility in the object. 
With these functions, the object can return some message or private/protected properties.<br>
The <b>__call()</b> and <b>__callStatic()</b> take action when some method called doesn't exist ou doesn't have <i>public</i> visibility. 
The difference is that <b>__callStatic()</b> call static functions and <b>__call()</b> does not.<br>
We can create a class to exemplify all those methods:<br>
<img src="playerclass.png"><br>
<xmp>Test:
require_once("Player.php");
$playerStats = array("Danielson", 12, 16, 20);
$dan = new Player($playerStats);
$dmgPoints = $dan->getDamageDealt();
echo "The player has caused $dmgPoints points of damage" . PHP_EOL;
Player::getDescription($playerStats);
$dan->doMagicTrick();
$dan::doJumpAcross("12", $dan->measure);
echo "With some private conversation, we discover that {$dan->name} has {$dan->intelligence} points of intelligence. Ask for powerfull magic!" . PHP_EOL;

Result:
<?php 
require_once("Player.php");
$playerStats = array("Danielson", 12, 16, 20);
$dan = new Player($playerStats);
$dmgPoints = $dan->getDamageDealt();
echo "The player has caused $dmgPoints points of damage" . PHP_EOL;
Player::getDescription($playerStats);
$dan->doMagicTrick();
$dan::doJumpAcross("12", $dan->measure);
echo "With some private conversation, we discover that {$dan->name} has {$dan->intelligence} points of intelligence. Ask for powerfull magic!" . PHP_EOL;
?></xmp>  
</body>
</html>