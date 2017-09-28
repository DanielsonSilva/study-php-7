<?php 

/**
 * Handler of any fatal error that may occur
 */
function __fatalHandler()
{
	$error = error_get_last();
	//check if it's a core/fatal error, otherwise it's a normal shutdown
	if ($error !== NULL && in_array($error['type'], array(E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR, E_COMPILE_WARNING,E_RECOVERABLE_ERROR))) {
		echo "<pre>fatal error:\n";
		print_r($error);
		echo "</pre>";
		die;
	}
}

register_shutdown_function('__fatalHandler');

/**
 * Practice function to test Type Declaration without type coercion
 * @param unknown $a Any value
 */
function sendMoney($a) {
	var_dump($a);
}

?>
<html>
<title>Testing Scalar Type Declaration in PHP 7</title>

<b>Function created:</b><br>
function sendMoney($a) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;var_dump($a);<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= sendMoney(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= sendMoney("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= sendMoney("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= sendMoney("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= sendMoney("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= sendMoney("false") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= sendMoney(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= sendMoney(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= sendMoney(false) ?><br>
<br>
<!-- TEST WITH INT -->
<?php 

/**
 * Practice function to test Type Declaration with type coercion
 * @param int $a Preferably an int value
 */
function sendData(int $a) {
	var_dump($a);
}

?>
<b>Function changed:</b><br>
function sendData(<b>int</b> $a) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;var_dump($a);<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= sendData(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= sendData("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value: <b>Fatal Error Occur</b><?// sendData("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= sendData("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<b>Fatal Error Occur</b><?// sendData("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<b>Fatal Error Occur</b><?// sendData("false") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= sendData(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= sendData(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= sendData(false) ?><br>
<br>
<!-- TEST WITH STRING -->
<?php 

/**
 * Practice function to test Type Declaration with type coercion
 * @param string $a Preferably an string value
 */
function sendString(string $a) {
	var_dump($a);
}

?>
<b>Function changed:</b><br>
function sendData(<b>string</b> $a) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;var_dump($a);<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= sendString(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= sendString("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= sendString("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= sendString("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= sendString("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= sendString("false") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= sendString(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= sendString(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= sendString(false) ?><br>
<br>
<!-- TEST WITH FLOAT -->
<?php 

/**
 * Practice function to test Type Declaration with type coercion
 * @param string $a Preferably an string value
 */
function sendFloat(float $a) {
	var_dump($a);
}

?>
<b>Function changed:</b><br>
function sendData(<b>float</b> $a) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;var_dump($a);<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= sendFloat(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= sendFloat("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<b>Fatal Error Occur</b><?// sendFloat("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= sendFloat("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<b>Fatal Error Occur</b><?// sendFloat("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<b>Fatal Error Occur</b><?// sendFloat("false") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= sendFloat(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= sendFloat(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= sendFloat(false) ?><br>
<br>
<!-- TEST WITH BOOL -->
<?php 

/**
 * Practice function to test Type Declaration with type coercion
 * @param string $a Preferably an string value
 */
function sendBoolean(bool $a) {
	var_dump($a);
}

?>
<b>Function changed:</b><br>
function sendData(<b>bool</b> $a) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;var_dump($a);<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= sendBoolean(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= sendBoolean("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= sendBoolean("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= sendBoolean("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= sendBoolean("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= sendBoolean("false") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= sendBoolean(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= sendBoolean(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= sendBoolean(false) ?><br>
<br>
</html>