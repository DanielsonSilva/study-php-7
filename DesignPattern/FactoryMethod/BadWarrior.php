<?php 

require_once("BadCharacterPlayer.php");

class BadWarrior extends BadCharacterPlayer
{
	public function __construct()
	{
		parent::__construct("BadWarrior");
	}
}