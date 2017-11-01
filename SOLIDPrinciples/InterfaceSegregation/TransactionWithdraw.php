<?php 

class TransactionWithdraw
{
	public function withdraw(float $amount): string
	{
		return "You've withdrawed U\$$amount." . PHP_EOL;
	}
}