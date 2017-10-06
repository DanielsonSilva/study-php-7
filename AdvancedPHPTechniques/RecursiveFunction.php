<html>
<title>Recursive Function Example</title>
<body>
<b>Recursive Functions</b><br>
<br>
A recursive function is a function that calls itself.<br>
It starts with a basic condition. This basic condition is when the recursive function stop and every call to itself, it becomes more close to reach the basic condition.<br>
We can do an exemple of factorial operation:<br>
5! = 5*4*3*2*1 = 120<br>
4! = 4*3*2*1 = 24<br>
<br>
function factorial($n) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;if ($n == 1) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return 1;<br>
&nbsp;&nbsp;&nbsp;&nbsp;} else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return ($n * factorial($n-1));<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}<br>
echo factorial(5);<br>
echo factorial(4);<br>
echo factorial(130);<br>
echo factorial(200);<br>
<br>
Gives us the result:<br>
<br>
<?php 
function factorial($n) {
	if ($n == 1) {
		return 1;
	} else {
		return ($n * factorial($n-1));
	}
}
echo factorial(5); echo "<br>";
echo factorial(4); echo "<br>";
echo factorial(130); echo "<br>";
echo factorial(200);
?><br>
<br>
The recursive function can be used to show some structure of a tree easier than not using it.<br>
</body>
</html>