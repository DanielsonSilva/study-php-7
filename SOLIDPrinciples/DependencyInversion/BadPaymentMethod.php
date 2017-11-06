<?php 

require_once("BadTransferPaymentMethod.php");

class BadPaymentMethod
{
	public function processPayment()
	{
		$pay = new BadTransferPaymentMethod();
		return ($pay->process());
	}
}
