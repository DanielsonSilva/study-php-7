<?php 
// It has to be the first command in the script to work
// If equals 1, anything passed wrong won't be converted and gives a Fatal Error
declare(strict_types=0);

/**
 * General Error Handler
 * @param unknown $errno Error Number
 * @param unknown $errstr Error string
 * @param unknown $errfile Error File
 * @param unknown $errline Error Line
 * @return boolean
 */
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
	if (!(error_reporting() & $errno)) {
		// This error code is not included in error_reporting, so let it fall
		// through to the standard PHP error handler
		return false;
	}

	switch ($errno) {
		case E_USER_ERROR:
			echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
			echo "  Fatal error on line $errline in file $errfile";
			echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
			echo "Aborting...<br />\n";
			exit(1);
			break;

		case E_USER_WARNING:
			echo "<b>A WARNING</b> [$errno] $errstr at line $errline\n";
			break;

		case E_USER_NOTICE:
			echo "<b>A NOTICE</b> [$errno] $errstr<br />\n";
			break;

		default:
			echo "<b>Unknown error type:</b> [$errno] $errstr at line $errline\n";
			break;
	}

	/* Don't execute PHP internal error handler */
	return true;
}

// Setting error handler
set_error_handler("myErrorHandler");

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
 * Practice function to test Return Type Declaration without type coercion
 * @param unknown $a Any value
 */
function double($a) {
	return $a * 2;
}

?>
<html>
<title>Testing Return Type Declaration in PHP 7</title>
<body>
<b>Function created:</b><br>
function double($a) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $a * 2;<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= double(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= double("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= double("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= double("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= double("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= double("false") ?><br>
Testing the function passing an <i>string ("")</i> value:<?= double("") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= double(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= double(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= double(false) ?><br>
<br>

<!-- TEST WITH INT -->
<?php 

/**
 * Practice function to test Return Type Declaration with type coercion
 * @param unknown $a Any value
 */
function triple($a): int {
	return $a * 3;
}

?>
<b>Function created:</b><br>
function triple($a)<b>: int</b> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $a * 3;<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= triple(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= triple("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= triple("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= triple("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= triple("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= triple("false") ?><br>
Testing the function passing an <i>string ("")</i> value:<?= triple("") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= triple(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= triple(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= triple(false) ?><br>
<br>

<!-- TEST WITH STRING -->
<?php 

/**
 * Practice function to test Return Type Declaration with type coercion
 * @param unknown $a Any value
 */
function concatenateOk($a): string {
	return $a . " thats ok!";
}

?>
<b>Function created:</b><br>
function concatenateOk($a)<b>: string</b> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $a . "thats ok!";<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= concatenateOk(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= concatenateOk("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= concatenateOk("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= concatenateOk("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= concatenateOk("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= concatenateOk("false") ?><br>
Testing the function passing an <i>string ("")</i> value:<?= concatenateOk("") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= concatenateOk(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= concatenateOk(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= concatenateOk(false) ?><br>
<br>
<!-- TEST WITH FLOAT -->
<?php 

/**
 * Practice function to test Return Type Declaration with type coercion
 * @param string $a Any value
 */
function powerOfTwo($a): float {
	return $a * $a;
}

?>
<b>Function created:</b><br>
function powerOfTwo($a)<b>: float</b> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $a * $a;<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= powerOfTwo(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= powerOfTwo("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= powerOfTwo("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= powerOfTwo("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= powerOfTwo("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= powerOfTwo("false") ?><br>
Testing the function passing an <i>string ("")</i> value:<?= powerOfTwo("") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= powerOfTwo(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= powerOfTwo(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= powerOfTwo(false) ?><br>
<br>

<!-- TEST WITH BOOL -->
<?php 

/**
 * Practice function to test Return Type Declaration with type coercion
 * @param string $a Any value
 */
function onlyReturn($a): bool {
	return $a;
}

?>
<b>Function created:</b><br>
function onlyReturn($a)<b>: bool</b> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return $a;<br>
}<br><br>

Testing the function passing an <i>int (100)</i> value:<?= onlyReturn(100) ?><br>
Testing the function passing an <i>string ("100")</i> value:<?= onlyReturn("100") ?><br>
Testing the function passing an <i>string ("hello")</i> value:<?= onlyReturn("hello") ?><br>
Testing the function passing an <i>string ("56.78")</i> value:<?= onlyReturn("56.78") ?><br>
Testing the function passing an <i>string ("true")</i> value:<?= onlyReturn("true") ?><br>
Testing the function passing an <i>string ("false")</i> value:<?= onlyReturn("false") ?><br>
Testing the function passing an <i>string ("")</i> value:<?= onlyReturn("") ?><br>
Testing the function passing an <i>float (12.34)</i> value:<?= onlyReturn(12.34) ?><br>
Testing the function passing an <i>boolean (true)</i> value:<?= onlyReturn(true) ?><br>
Testing the function passing an <i>boolean (false)</i> value:<?= onlyReturn(false) ?><br>
<br>
</body>
</html>