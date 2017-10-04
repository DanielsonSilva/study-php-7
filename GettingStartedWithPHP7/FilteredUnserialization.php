<html>
<title>Filtered Unserialization</title>
<body>
In PHP language, we can serialize and unserialize an object to use it later. This process consists of serialize an object, transforming the object into a string and unserialize the string to return to object.<br>
The problem is the attacks that can happen if this string is compromised. If this happen, the string can become an object of something that the developer didn't expect and suffer the attack.<br>
To fix this, in version 7 of PHP, we can filter the unserialization to certain classes. If the string don't belong to any of declared classes, then the unserialization results in an Incomplete Class.<br>
Let's see some example:<br>
<br>
<?php 
class Car {
	public $name;
	public function __construct($name) {
		$this->name = $name;
		echo "The car {$this->name} was created.";
	}
	public function run() {
		echo "The car {$this->name} is running.";
	}
	public function stop() {
		echo "The car {$this->name} stopped.";
	}
}

class Tire {
	public $size;
	public $brand;
	public function __construct($s, $b) {
		$this->size = $s;
		$this->brand = $b;
		echo "The tire {$this->brand} of size {$this->size} was created.";
	}
}
?>
class Car {<br>
&nbsp;&nbsp;&nbsp;&nbsp;public $name;<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function __construct($name) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->name = $name;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "The car $name was created.";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function run() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "The car $name is running.";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function stop() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "The car $name stopped.";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
<br>
class Tire {<br>
&nbsp;&nbsp;&nbsp;&nbsp;public $size;<br>
&nbsp;&nbsp;&nbsp;&nbsp;public $brand;<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function __construct($s, $b) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->size = $s;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->brand = $b;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "The tire {$this->brand} of size {$this->size} was created.";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
<br>
And then execute these command lines:<br>
<br>
$old_car = new Car("Buckle");<br>
$old_car->run();<br>
$new_tire = new Tire("Firestone",30);<br>
$serialized_classes = serialize([$old_car, $new_tire]);<br>
var_dump($serialized_classes);<br>
var_dump(unserialize($serialized_classes));<br>
<br>
Gives us the result:<br>
<br>
<?php 
$old_car = new Car("Buckle"); echo "<br>";
$old_car->run(); echo "<br>";
$new_tire = new Tire(30,"Firestone"); echo "<br>";
$serialized_classes = serialize([$old_car, $new_tire]);
var_dump($serialized_classes); echo "<br>";
var_dump(unserialize($serialized_classes)); echo "<br>";
?>
<br>
But if we change the last line to <b>var_dump(unserialize($serialized_classes,['allowed_classes' => ['Car']));</b>, the results become:<br>
<br>
<?php 
$old_car = new Car("Buckle"); echo "<br>";
$old_car->run(); echo "<br>";
$new_tire = new Tire(30,"Firestone"); echo "<br>";
$serialized_classes = serialize([$old_car, $new_tire]);
var_dump($serialized_classes); echo "<br>";
var_dump(unserialize($serialized_classes, ['allowed_classes' => ['Car']])); echo "<br>";
?>
<br>
Or try with another class like <b>var_dump(unserialize($serialized_classes,['allowed_classes' => ['Tire']));</b>, results in:<br>
<br>
<?php 
$old_car = new Car("Buckle"); echo "<br>";
$old_car->run(); echo "<br>";
$new_tire = new Tire(30,"Firestone"); echo "<br>";
$serialized_classes = serialize([$old_car, $new_tire]);
var_dump($serialized_classes); echo "<br>";
var_dump(unserialize($serialized_classes, ['allowed_classes' => ['Tire']])); echo "<br>";
?>
</body>
</html>