<html>
<head>
<meta charset="UTF-8">
<title>Heredoc Example</title>
</head>
<body>
<b>Heredoc</b><br>
<br>
The <b>Heredoc</b> technique is used when the string that is been declared is long by several lines. Besides that, the single quotes and double quotes doesn't need to be escaped ir order to be shown in the string.<br>
Heredoc syntax:<br>
<br>
$var = <<<[identificator]<br>
[string to be set into $var]<br>
[identificator];<br>
<br>
The [identificator] can be any name and have to be in a newline at the end. The [identificator] in the end can't have spaces and tabs. So, if we do the following commands:<br>
<br>
$a = 1;<br>
$b = 2;<br>
$longString = &lt;&lt;&lt;STATEMENT<br>
The first two numbers of the natural numbers is '$a' and '\$b'.&lt;br&gt;<br>
If we multiply those numbers by 10, we obtain "11" and "<br>
STATEMENT<br>
. $b*10 . &lt;&lt;&lt;STATEMENT<br>
"&lt;br&gt;<br>
There are infinite others number in natural numbers set and has several 'operations' to be made.&lt;br&gt;<br>
All of this are explaned in math classes.&lt;br&gt;<br>
STATEMENT;<br>
echo $longString;<br>
<br>
Gives the result:<br>
<br>
<?php 
$a = 1;
$b = 2;
$longString = <<<STATEMENT
The first two numbers of the natural numbers is '$a' and '\$b'.<br>
If we multiply those numbers by 10, we obtain "10" and "
STATEMENT
. $b*10 . <<<STATEMENT
"<br>
There are infinite others number in natural numbers set and has several 'operations' to be made.<br>
All of this are explaned in math classes.<br>
STATEMENT;
echo $longString;
?>
</body>
</html>
