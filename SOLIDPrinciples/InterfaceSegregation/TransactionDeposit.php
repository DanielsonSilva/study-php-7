<?php

class TransactionDeposit
{
	public function deposit(float $amount): string
	{
		return "You've deposited U\$$amount." . PHP_EOL;
	}
}