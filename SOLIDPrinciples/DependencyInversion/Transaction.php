<?php 

require_once("PaymentMethod.php");

class Transaction
{
	public function pay(PaymentMethod $method)
	{
		return ($method->process());
	}
}