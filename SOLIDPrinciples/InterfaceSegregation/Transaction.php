<?php

class Transaction
{
	public function deposit(float $amount): string
	{
		return "You've deposited U\$$amount." . PHP_EOL;
	}
	
	public function withdraw(float $amount): string
	{
		return "You've withdrawed U\$$amount." . PHP_EOL;
	}
}