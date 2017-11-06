<?php 

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