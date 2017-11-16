<?php 

abstract class BadCharacterPlayer
{
	private $class;
	
	public function __construct($c)
	{
		$this->class = $c;
	}
	
	public function getClass(): string
	{
		return $this->class;
	}
}