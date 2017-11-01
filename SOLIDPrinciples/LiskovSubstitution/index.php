<html>
<head>
<meta charset="UTF-8">
<title>SOLID Principles - Liskov Substitution Example</title>
</head>
<body>
<b>Liskov Substitution Principle</b><br>
<br>
This principle states that the subclasses can substitute their base classes. 
That means that if the subclass is replaced with its base class, the program has to work the same way. <br>
One example is the fact that a square is a rectangle with one restriction: every side has to be the same length. 
By this sentence, we could think we can make a classe square extend the rectangle class, so they will seems:<br>
<xmp>BadRectangle.php:
class BadRectangle
{
	protected $width;
	protected $height;
	
	public function setWidth(float $wid): void
	{
		$this->width = $wid;
	}
	
	public function setHeight(float $hei): void
	{
		$this->height = $hei;
	}
	
	public function getArea(): float
	{
		return ($this->width * $this->height);
	}
}

BadSquare.php:
require_once("BadRectangle.php");

class BadSquare extends BadRectangle
{
	public function setWidth(float $wid): void
	{
		$this->width = $wid;
		$this->height = $wid;
	}

	public function setHeight(float $hei): void
	{
		$this->width = $hei;
		$this->height = $hei;
	}
}

Test:
require_once("BadSquare.php");
$square = new BadSquare();
$rect = new BadRectangle();
$square->setWidth(3);
$square->setHeight(4);
$rect->setWidth(3);
$rect->setHeight(4);
echo "Area(square) = {$square->getArea()} and Area(rectangle) = {$rect->getArea()}" . PHP_EOL;

Result:
<?php 
require_once("BadSquare.php");
$square = new BadSquare();
$rect = new BadRectangle();
$square->setWidth(3);
$square->setHeight(4);
$rect->setWidth(3);
$rect->setHeight(4);
echo "Area(square) = {$square->getArea()} and Area(rectangle) = {$rect->getArea()}" . PHP_EOL;
?></xmp>
After we set the width and height the same for both objects, we expect them to have the same behaviour. 
The area from the objects is different, so they doesn't behave the same.<br>
To fix this, we can add a abstraction layer and think a more general object that these objects can extend. 
Since the square and rectangle are shapes, we can create a class for design any kind of shape. We can expect these classes below:
<xmp>IShape.php:
interface IShape
{
	public function getArea(): float;
}

Rectangle.php:
require_once("IShape.php");

class Rectangle implements IShape
{
	protected $width;
	protected $height;
	
	public function setWidth(float $wid): void
	{
		$this->width = $wid;
	}
	
	public function setHeight(float $hei): void
	{
		$this->height = $hei;
	}
	
	public function getArea(): float
	{
		return ($this->width * $this->height);
	}	
}

Square.php:
require_once("IShape.php");

class Square implements IShape
{
	protected $side;
	
	public function setSide(float $input_side): void
	{
		$this->side = $input_side;
	}

	public function getArea(): float
	{
		return (pow($this->side,2));
	}
}

Test:
require_once("IShape.php");
require_once("Rectangle.php");
require_once("Square.php");

function displayArea(IShape $obj)
{
	echo "This " . get_class($obj) . " have its area measure " . $obj->getArea() . "." . PHP_EOL;
}
unset($square);
unset($rect);
$square = new Square();
$rect = new Rectangle();
$square->setSide(4);
$rect->setWidth(3);
$rect->setHeight(2);
displayArea($square);
displayArea($rect);

Result:
<?php 
require_once("IShape.php");
require_once("Rectangle.php");
require_once("Square.php");

function displayArea(IShape $obj)
{
	echo "This " . get_class($obj) . " have its area measure " . $obj->getArea() . "." . PHP_EOL;
}
unset($square);
unset($rect);
$square = new Square();
$rect = new Rectangle();
$square->setSide(4);
$rect->setWidth(3);
$rect->setHeight(2);
displayArea($square);
displayArea($rect);
?></xmp>
So, finding a common ground between not substitutable classes and let them extend from a generic class can resolve this LSP problem.<br> 
</body>
</html>