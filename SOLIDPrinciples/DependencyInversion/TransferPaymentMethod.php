<?php 

require_once("PaymentMethod.php");

class TransferPaymentMethod implements PaymentMethod
{
	public function process()
	{
		echo "Making a transfer... " . PHP_EOL;
		echo "Transfer success." . PHP_EOL;
		return true;
	}
}