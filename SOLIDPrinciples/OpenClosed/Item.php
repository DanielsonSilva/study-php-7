<?php 

class Item
{
	public function useHeal(int $num): void
	{
		echo "You've gained $num hit points.<br>";
	}
	public function usePotionOfStrength(int $points, int $duration): void
	{
		echo "You have $points Strength points for $duration minutes.<br>";
	}
	public function useBook(int $points): void
	{
		echo "You have $points Intelligence points for $duration minutes.<br>";
	}
}