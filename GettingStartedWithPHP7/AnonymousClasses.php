<?php 
class Window {

	public function placeWindow() {
		echo "The window is placed in the car";
	}
}

class Car {

	public function __construct() {
		echo "Car created";
	}
	
	public function setWindow($window) {
		echo "The Window is chosen for this car:";
		var_dump($window);
		$this->window = $window;
	}
	
	public function placeWindow() {
		$this->window->placeWindow();
	}
}
?>
<html>
<title>Anonymous Class Example</title>
<body>
The anonymous class is a simple class, usually containing 15 to 30 lines of code, that has little scope. In other words, the anonymous class is a little class that is used in a few places.<br>
When a developer see this kind of class, we can say that this class is used only in certain class to attend unique purpose.
<br>
Example:<br>
class Window {<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function placeWindow() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "The window is placed in the car";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
<br>
class Car {<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function __construct() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "Car created";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function setWindow($window) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "The Window is chosen for this car:";<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var_dump($window);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->window = $window;<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function placeWindow() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->window->placeWindow();<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
<br>
If the following code is executed:<br>
<br>
$window = new Window();<br>
$car = new Car();<br>
$car->setWindow($window);<br>
$car->placeWindow();<br>
<br>
Gives us the result:<br>
<?php 
$window = new Window();
echo "<br>";
$car = new Car();
echo "<br>";
$car->setWindow($window);
echo "<br>";
$car->placeWindow();
echo "<br>";
?>
<br>
Since the <b>Window</b> class is small and is used only in <b>setWindow</b> and <b>placeWindow</b> functions, we can declare the <b>Window</b> class as an anonymous class. In this way, the following code could be:<br>
<br>
$car = new Car();<br>
$car->setWindow(new class ('Glass_shield'){<br>
&nbsp;&nbsp;&nbsp;&nbsp;public function placeWindow() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "The window is placed in the car";<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
});<br>
$car->placeWindow();<br>
<br>
Gives us the result:<br>
<br>
<?php 
$car = new Car();
echo "<br>";
$car->setWindow(new class ('Glass_shield'){
	public function placeWindow() {
		echo "The window is placed in the car";
	}
});
echo "<br>";
$car->placeWindow();
echo "<br>";
?>
<br>
</body>
</html>