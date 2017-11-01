<?php
require_once("BadRectangle.php");

class BadSquare extends BadRectangle
{
	public function setWidth(float $wid): void
	{
		$this->width = $wid;
		$this->height = $wid;
	}

	public function setHeight(float $hei): void
	{
		$this->width = $hei;
		$this->height = $hei;
	}
}
