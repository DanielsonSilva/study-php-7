<html>
<head>
<meta charset="UTF-8">
<title>SOLID Principles - Dependency Inversion Example</title>
</head>
<body>
<b>Dependency Inversion Principle</b><br>
<br>
This principle states that high level modules, low level modules and details should depend on abstraction. 
This means that the parameters of functions that we create will use interface instead of object name itself.  
Using the interface in the parameters will loose the dependency between classes, in other words, the classes may vary and the methods still works.<br>
For example, if we have a class that depend exclusively on another can cause early maintenance:<br>
<xmp>BadPaymentMethod.php
require_once("BadTransferPaymentMethod.php");

class BadPaymentMethod
{
	public function processPayment()
	{
		$pay = new BadTransferPaymentMethod();
		return ($pay->process());
	}
}

BadTransferPaymentMethod.php
class BadTransferPaymentMethod
{
	public function process()
	{
		echo "Transfering..." . PHP_EOL;
		return true;
	}
}

Test:
require_once("BadPaymentMethod.php");
$payMethod = new BadPaymentMethod();
$payMethod->processPayment();
// Now pay with credit card will use another payment method class?

Result:
<?php 
require_once("BadPaymentMethod.php");
$payMethod = new BadPaymentMethod();
$payMethod->processPayment();
// Now pay with credit card will use another payment method class?
?></xmp>
To fix this, we could create an interface and define this interface in the parameter function declared:<br>
<xmp>PaymentMethod.php
interface PaymentMethod
{
	public function process();
}

TransferPaymentMethod.php
require_once("PaymentMethod.php");

class TransferPaymentMethod implements PaymentMethod
{
	public function process()
	{
		echo "Making a transfer..." . PHP_EOL;
		echo "Transfer success." . PHP_EOL;
		return true;
	}
}

CreditPaymentMethod.php
require_once("PaymentMethod.php");

class CreditPaymentMethod implements PaymentMethod
{
	public function process()
	{
		echo "Making a credit payment..." . PHP_EOL;
		echo "Credit payment success." . PHP_EOL;
		return true;
	}
}

Transaction.php
require_once("PaymentMethod.php");

class Transaction
{
	public function pay(PaymentMethod $method)
	{
		return ($method->process());
	}
}

Test:
require_once("Transaction.php");
$transaction = new Transaction();
$credit = new CreditPaymentMethod();
$transfer = new TransferPaymentMethod();
// Paying with credit
$transaction->pay($credit);
// And paying will transfer with the same function
$transaction->pay($transfer);

Result:
<?php 
require_once("Transaction.php");
require_once("TransferPaymentMethod.php");
require_once("CreditPaymentMethod.php");
$transaction = new Transaction();
$credit = new CreditPaymentMethod();
$transfer = new TransferPaymentMethod();
// Paying with credit
$transaction->pay($credit);
// And paying will transfer with the same function
$transaction->pay($transfer);
?></xmp>
</body>
</html>