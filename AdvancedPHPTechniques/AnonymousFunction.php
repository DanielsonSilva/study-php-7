<html>
<title>Anonymous Function Example</title>
<body>
<b>Anonymous Functions</b><br>
<br>
An anonymous function is a function without a name and is created to use only a few times within the script. We can use an anonymous function assign it in a variable. Here is some example:<br>
<br>
$message = function() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Some function message.";<br>
};<br>
<br>
<?php 
$message = function() {
	echo "Some function message.";
};
?>
- To execute the anonymous function right after the declaration we use parenthesis in certain places:<br>
<br>
$message = <b>(</b>function() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Some function message.";<br>
}<b>)()</b>;<br>
<br>
The result is:<br>
<br>
<?php 
$message = (function() {
	echo "Some function message.";
})();
?><br>
<br>
- To execute the function, open and close parenthesis right after the variable name:<br>
<br>
$message();<br>
<br>
The result is:<br>
<br>
<?php
$message = function() {
	echo "Some function message.";
};
$message();
?><br>
<br>
- These function can be passed as arguments to execute within another function. In this case:<br>
<br>
function executeSomeFunction ($var) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$var();<br>
}<br>
executeSomeFunction($message);<br>
<br>
The result is:<br>
<br>
<?php 
function executeSomeFunction ($var) {
	$var();
}
executeSomeFunction($message);
?><br>
<br>
- The anonymous function can use arguments, placing the arguments between the parenthesis. The change is:<br>
<br>
$run = function($km) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Run {$km}km now!";<br>
};<br>
$run(5);<br>
<br>
Gives us the result:<br>
<br>
<?php 
$run = function($km) {
	echo "Run {$km}km now!";
};
$run(5);
?><br>
<br>
- The anonymous function can use variables outside the scope of function using the <b>use</b> keyword. Any changes made in variable specified in <b>use</b> keyword do not change the original value when the function end. If we want to change the original value, we have to put a <b>&</b> before the variable. The use is the following:<br>
<br>
$name = "Flavio";<br>
$assign = function($number) use ($name) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$name = "Danielson";<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "$name is the runner number $number.";<br>
};<br>
$assign(11);<br>
echo $name;<br>
<br>
The result is:<br>
<br>
<?php 
$name = "Flavio";
$assign = function($number) use ($name) {
	$name = "Danielson";
	echo "$name is the runner number $number.";
};
$assign(11); echo "<br>";
echo $name;
?><br>
<br>
----
<br>
$name = "Flavio";<br>
$assign = function($number) use (<b>&</b>$name) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$name = "Danielson";<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "$name is the runner number $number.";<br>
};<br>
$assign(11);<br>
echo $name;<br>
<br>
The result is:<br>
<br>
<?php 
$name = "Flavio";
$assign = function($number) use (&$name) {
	$name = "Danielson";
	echo "$name is the runner number $number.";
};
$assign(11); echo "<br>";
echo $name;
?><br>
<br>
- Some built-in functions receive a <i>callable</i> argument in its list. An anonymous function can be passed to this function. Get the function <b>array_filter</b> that receive a <i>callable</i> function as the second argument to apply for each of array value passed in the first argument. We can test this by:<br>
<br>
$first_numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);<br>
$getEven = function($value) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return ($value%2 == 0);<br>
};<br>
$result = array_filter($first_numbers, $getEven);<br>
echo json_encode($result, JSON_PRETTY_PRINT);<br>
<br>
Gives the result:<br>
<br>
<?php 
$first_numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$getEven = function($value) {
	return ($value%2 == 0);
};
$result = array_filter($first_numbers, $getEven);
echo json_encode($result, JSON_PRETTY_PRINT);
?>
</body>
</html>
















