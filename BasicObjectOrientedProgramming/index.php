<html>
<head>
<meta charset="UTF-8">
<title>Basic Object-Oriented Programming Example</title>
</head>
<body>
<b>Basic Object-Oriented Programming</b><br>
<br>
For this section, it will be only one example for all this section. It covers the basic from OOP and some new features in PHP 7.
 The advanced techniques in OOP will be shown in next sections.<br>
For this example, we've made two classes: <b>Person</b> and <b>Engineer</b>. <b>Engineer</b> will be a child class from <b>Person</b> with some individual characteristics.
 The two classes was built following the <a href="http://www.php-fig.org/psr/psr-1/">PSR-1</a> and <a href="http://www.php-fig.org/psr/psr-2/">PSR-2</a>.<br>
The classes can be shown below:<br>
<b>Person Class:</b><br>
<img src="resources\PersonClass.png"><br>
<b>Engineer Class:</b><br>
<img src="resources\EngineerClass.png"><br>
<b>Test code:</b>
<xmp>require_once("Person.php");
require_once("Engineer.php");
// creating the objects
$guy = new Person("James"); echo "<br>";
$niceGuy = new Engineer("Danielson"); echo "<br>";
// playing with the objects created
// Can't the age be less than 18
$guy->setAge(15); echo "<br>";
// Set the age 19
$guy->setAge(19); echo "<br>";
// Set the age 31
$niceGuy->setAge(31); echo "<br>";
// Can't be done because 'setDimensions' is defined in child class. Uncomment to discover the fatal error.
//$guy->setDimensions(160.3, 120.4);
// Setting the dimensions of the engineer
$niceGuy->setDimensions(176.4, 157.4);
// Trying to set a document it without proper data and with proper data
$guy->setDocumentId(3887472);
$guy->setDocumentId("3887472");
$niceGuy->setDocumentId("35532137472");
/* Setting the birthdays and then display it.
Observe the name of the class in the returned string */
$guy->setBirthday(array(6, 30, 1995));
$niceGuy->setBirthday(array(10, 29, 1986));
echo $guy->displayBirthday(); echo "<br>";
echo $niceGuy->displayBirthday(); echo "<br>";
</xmp>
Executing the code from above, we get the results below:<br>
<br>
<?php 
require_once("Person.php");
require_once("Engineer.php");
// creating the objects
$guy = new Person("James"); echo "<br>";
$niceGuy = new Engineer("Danielson"); echo "<br>";
// playing with the objects created
// Can't the age be less than 18
$guy->setAge(15); echo "<br>";
// Set the age 19
$guy->setAge(19); echo "<br>";
// Set the age 31
$niceGuy->setAge(31); echo "<br>";
// Can't be done because 'setDimensions' is defined in child class. Uncomment to discover the fatal error.
//$guy->setDimensions(160.3, 120.4);
// Setting the dimensions of the engineer
$niceGuy->setDimensions(176.4, 157.4);
// Trying to set a document it without proper data and with proper data
$guy->setDocumentId(3887472);
$guy->setDocumentId("3887472");
$niceGuy->setDocumentId("35532137472");
/* Setting the birthdays and then display it.
Observe the name of the class in the returned string */
$guy->setBirthday(array(6, 30, 1995));
$niceGuy->setBirthday(array(10, 29, 1986));
echo $guy->displayBirthday(); echo "<br>";
echo $niceGuy->displayBirthday(); echo "<br>";
?><br>
<br>
This example tested:<br>
<ul>
	<li>Constructor
	<li>Destructor
	<li>Visibility
	<li>Data conversion
	<li>Inheritance
	<li>Class constants
	<li>PHP Standard Recommendations
</ul>
And now the objects created will be destroyed now that the file has finished &darr; (destructor functions getting into action)<br>	
</body>
</html>