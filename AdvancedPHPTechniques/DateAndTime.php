<html>
<head>
<meta charset="UTF-8">
<title>Date and Time Example</title>
</head>
<body>
<b>Date and Time</b><br>
<br>
Since PHP 5.2, PHP has the <i>DateTime</i> class to manage date and time manipulation. This class facilitates the manipulation of date in comparison from previous version that used <i>date('Y-m-d');</i>.<br>
The <i>php.ini</i> has the definition of the timezone used in the php application. If none is set, the PHP assumes that is UTC. We can set through <i>date_default_timezone_set('&lt;timezone&gt;');</i> function and check which timezone the PHP is using with <i>date_default_timezone_get();</i>.<br>
To use the <i>DateTime</i> class, we can use to check the current date and time as:<br>
<br>
$current = new DateTime();<br>
var_dump($current);<br>
<br>
Resulting in:<br>
<br>
<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');

$current = new DateTime();
var_dump($current);
?><br>
<br>
We can use a method called <b>format</b> to format the date and time to our way:<br>
<br>
$current->format('d/m/Y &agrave;\s H:i:s') = <?= utf8_encode($current->format('d/m/Y à\s H:i:s')) ?><br>
<br>
If we have a date and time in specific format, we can create a <i>DateTime</i> object with:<br>
<br>
$anotherDate = "20/05/2012";<br>
$anotherDateTimeClass = DateTime::createFromFormat("d/m/Y", $anotherDate);<br>
var_dump($anotherDateTimeClass);<br>
<br>
Resulting in:<br>
<br>
<?php 
$anotherDate = "20/05/2012";
$anotherDateTimeClass = DateTime::createFromFormat("d/m/Y", $anotherDate);
var_dump($anotherDateTimeClass);
?><br>
<br>
We can change the timezone from a <i>DateTime</i> object in creating using <i>DateTimeZone</i> object:<br>
<br>
$currentAnotherZone = new DateTime(null, 'America/Sao_Paulo');<br>
var_dump($currentAnotherZone);<br>
<br>
Resulting in:<br>
<br>
<?php 
$currentAnotherZone = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
var_dump($currentAnotherZone);
?><br>
<br>
We can do comparisons between <i>DateTime</i> objects like:<br>
<br>
echo ($anotherDate < $current) ? "\$anotherDate is lesser than \$current" : "\$current is lesser or equal than \$anotherDate"; -> <b><?= ($anotherDate < $current) ? "\$anotherDate is lesser than \$current" : "\$current is lesser or equal than \$anotherDate"; ?></b><br>
<br>
We can manage date and time intervals to add or subtract from a <i>DateTime</i> object. For this, we use the <i>TimeInterval</i> object.<br>
This object has a pattern of using a <b>P</b> to determine the period (Y - year, M - month, W - weeks, D - days) and <b>T</b> to determine the time (H - hour, M - minutes, S - seconds). The interval between two <i>DateTime</i> objects comes with a string combination of those letters. See an example:<br>
<br>
$current->add(new DateInterval("P1Y2MT1H")); results in:<br>
<?php 
$current->add(new DateInterval("P1Y2MT1H"));
var_dump($current);
?>, added one year, two months and one hour.<br>
And $current->sub(new DateInterval("P3Y2WT4S")); results in:<br> 
<?php 
$current->sub(new DateInterval("P3Y2WT4S"));
var_dump($current);
?>, subtracted three years, two weeks and four seconds<br>
<br>
There is a way to check several <i>DateTime</i> objects from same intervals until reach another <i>DateTime</i> object or a fixed number of recurring dates and times using <i>DatePeriod</i> class. If we have a start date and a end date and want to do some operation between these dates every month, we can do:<br>
<br>
$start = new DateTime();<br>
$end = new DateTime('2019-05-01T00:00:00');<br>
$interval = new DateInterval("P6M");<br>
$period = new DatePeriod($start, $interval, $end);<br>
foreach($period as $value) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;var_dump($value);<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;br&gt;";<br>
}<br>
echo "&lt;br&gt;";<br>
$anotherInterval = new DateInterval("P1MT5H");<br>
$anotherPeriod = new DatePeriod($start, $anotherInterval, 3);<br>
foreach($anotherPeriod as $value) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;var_dump($value);<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;br&gt;";<br>
}<br>
<br>
Resulting in:<br>
<br>
<?php 
$start = new DateTime();
$end = new DateTime('2019-05-01T00:00:00');
$interval = new DateInterval("P6M");
$period = new DatePeriod($start, $interval, $end);
foreach($period as $value) {
	var_dump($value);
	echo "<br>";
}
echo "<br>";
$anotherInterval = new DateInterval("P1MT5H");
$anotherPeriod = new DatePeriod($start, $anotherInterval, 3);
foreach($anotherPeriod as $value) {
	var_dump($value);
	echo "<br>";
}
?><br>
</body>
</html>













