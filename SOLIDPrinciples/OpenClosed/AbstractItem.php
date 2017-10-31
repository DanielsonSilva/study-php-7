<?php 

abstract class AbstractItem
{
	abstract public function use(int $points, int $duration = null): void;
}