<html>
<title>Testing Null Coalesce Operator in PHP 7</title>
<body>

The <b>PHP 7</b> comes with a new operator: Null Coalesce represented by <b>??</b>.<br>
It eliminates the use of commom use of <b>isset</b> to check if variables is set.<br>
<?php 
$name = "Danielson";
?>
The value from $name: <?= var_dump($name) ?><br>
So, if there is the command line: <b>echo isset($name) ? $name : "a"</b>, the result is: <?= isset($name) ? $name : "a" ?><br>
<?php $name = null ?>
The value from $name: <?= var_dump($name) ?><br>
If $name is set to null value and the execution of the same command line is: <?= isset($name) ? $name : "a" ?><br>

<br>


With the <b>Null Coalesce Operator</b> it become more simpler the same command line: <b>echo $name ?? "a"</b><br>
<?php $name = "Danielson"; ?>
The value from $name: <?= var_dump($name) ?><br>
The result from the coalesce operator is: <?= $name ?? "a" ?><br>
<?php $name = null; ?>
The value from $name: <?= var_dump($name) ?><br>
The result from the coalesce operator is: <?= $name ?? "a" ?><br>

<br>

Let's try with a variable that do not exist several attemps:<br>
<?php $name = "Danielson Flavio"; ?>
The value from $name: <?= var_dump($name) ?><br>
The value from $someVar: <?= var_dump($someVar) ?><br>
Command line: <b>echo $someVar ?? $name ?? "a"</b> -> <?= var_dump($someVar ?? $name ?? "a") ?><br>
Command line: <b>echo $name ?? $someVar ?? "a"</b> -> <?= var_dump($name ?? $someVar ?? "a") ?><br>
Command line: <b>echo "" ?? $someVar ?? $name ?? "a"</b> -> <?= var_dump("" ?? $someVar ?? $name ?? "a") ?><br>
Command line: <b>echo "" ?? $someVar ?? $name ?? "a"</b> -> <?= var_dump("" ?? $someVar ?? "a" ?? $name) ?><br>
Command line: <b>echo false ?? $someVar ?? $name ?? "a"</b> -> <?= var_dump(false ?? $someVar ?? "a" ?? $name) ?><br>
Command line: <b>echo "a" ?? $someVar ?? $name</b> -> <?= var_dump("a" ?? $someVar ?? $name) ?><br>

<br>

The <b>Null Coalesce Operator</b> returns the first of several arguments separated with <b>??</b> that <b>exists</b> and <b>is not null</b>.<br><br>


</body>
</html>