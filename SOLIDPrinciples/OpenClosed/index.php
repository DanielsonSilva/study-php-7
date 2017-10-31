<html>
<head>
<meta charset="UTF-8">
<title>SOLID Principles - Open Closed Example</title>
</head>
<body>
<b>Open Closed Principle</b><br>
<br>
This principle states that any class has to be closed for modification and open for extension. 
So, if a new requirement or a new feature has to be added to the application, this will be obtained 
through extending the classes already created and not changing them. To achieve this objective we 
have to use abstraction to make classes more flexible.<br>
Let's see the <b>Item</b> and <b>BadHero</b> classes below:<br>
<xmp>Item.php

class Item
{
	public function useHeal(int $num): void
	{
		echo "You've gained $num hit points.<br>";
	}
	public function usePotionOfStrength(int $points, int $duration): void
	{
		echo "You have $points Strength points for $duration minutes.<br>";
	}
	public function useBook(int $points): void
	{
		echo "You have $points Intelligence points for $duration minutes.<br>";
	}
}

BadHero.php

require_once("Item.php");
class BadHero
{
	public function useItem($item, int $points, int $duration): void
	{
		$itemAction = new Item();
		$itemReceived = 2;
		switch ($itemReceived) {
			case 1:
				$itemAction->useHeal($points);
				break;
			case 2:
				$itemAction->usePotionOfStrength($points, $duration);
				break;
			case 3:
				$itemAction->useBook($points);
				break;
			default:
				echo "Error: Item not expected";
				break;
		}
	}
}

Command lines:

require_once("BadHero.php");
$badHero = new BadHero();
$badHero->useItem(2, 10, 3);

Resulting in:

<?php
require_once("BadHero.php");
$badHero = new BadHero();
$badHero->useItem(2, 10, 3);
?></xmp>
Analyzing this class, we observe that if we need to add a new item, we have to create another function and change the existing already tested <b>Item</b> class. 
We have to alter the <b>BadHero</b> class to add a new item option in <i>useItem</i> function. 
Another question will be the usage of this class that the code will be more unreadable than applying abstraction. Let's see:<br>
Resulting in:<br>
<?php 

?><br>
<br>
To fix this we add abstraction into the idea. With abstraction we can have another classes:<br>
<xmp>AbstractItem.php
abstract class AbstractItem
{
	abstract public function use(int $points, int $duration = null): void;
}

ItemHeal.php
require_once("AbstractItem.php");

class ItemHeal extends AbstractItem
{
	public function use(int $points, int $duration = null): void
	{
		echo "You've gained $points hit points." . PHP_EOL;
	}
}

ItemPotionStrength.php
require_once("AbstractItem.php");

class ItemPotionStrength extends AbstractItem
{
	public function use(int $points, int $duration = null): void
	{
		echo "You have $points Strength points for $duration minutes." . PHP_EOL;
	}
}

ItemBook.php
require_once("AbstractItem.php");

class ItemBook extends AbstractItem
{
	public function use(int $points, int $duration = null): void
	{
		echo "You have $points Intelligence points for $duration minutes." . PHP_EOL;
	}
}

Hero.php
require_once("AbstractItem.php");

class Hero
{
	public function useItem($item, int $points, int $duration = null): void
	{
		$item->use($points, $duration);
	}
}

Command lines:
require_once("Hero.php");
require_once("ItemHeal.php");
require_once("ItemPotionStrength.php");
require_once("ItemBook.php");
$player = new Hero();
$player->useItem(new ItemHeal(), 10);
$player->useItem(new ItemPotionStrength(), 10, 3);
$player->useItem(new ItemBook(), 10);

Resulting in:
<?php 
require_once("Hero.php");
require_once("ItemHeal.php");
require_once("ItemPotionStrength.php");
require_once("ItemBook.php");
$player = new Hero();
$player->useItem(new ItemHeal(), 10);
$player->useItem(new ItemPotionStrength(), 10, 3);
$player->useItem(new ItemBook(), 10);
?></xmp>
This way, when a new item will be created, we do not have to modify any existing class, just create another class and extend from <b>AbstractItem</b>. 
So, the <b>Hero</b> class will use the item, whatever the item is, but this item has to extend from <b>AbstractItem</b> abstract class.
</body>
</html>