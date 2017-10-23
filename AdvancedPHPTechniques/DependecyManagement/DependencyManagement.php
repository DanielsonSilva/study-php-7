<html>
<title>Dependency Management Example</title>
<body>
<b>Dependency Management</b><br>
<br>
The dependency management is used to utilize third codes to help the software development in several areas. For example, there is a package for testing PHP codes called PHPUnit. There is a package called monolog made to register the log in a lot of ways with many options.<br> 
For example, below is the use of <b>monolog</b> package:<br>
<br>
&lt;?php<br>
require __DIR__ . '/vendor/autoload.php';<br>
use Monolog\Logger;<br>
use Monolog\Handler\StreamHandler;<br>
<br>
// create a log channel<br>
$log = new Logger('name');<br>
$log->pushHandler(new StreamHandler('monolog_test.log', Logger::WARNING));<br>
<br>
// add records to the log<br>
$log->warning('Foo');<br>
$log->error('Bar');<br>
?><br>
<br>
This will generate a log file <i>monolog_test.log</i> inside the folder with two logs with dates and hour: one for a warning and for an error. The content of the file will be:<br>
<br>
[2017-10-23 13:39:55] name.WARNING: Foo [] []<br>
[2017-10-23 13:39:55] name.ERROR: Bar [] []<br>
<?php

require __DIR__ . '/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('monolog_test.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');
?>


</body>
</html>