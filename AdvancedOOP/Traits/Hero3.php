<?php 

require_once("CombatMessage.php");
require_once("JourneyMessage.php");

class Hero3
{
	use CombatMessage, JourneyMessage {
		JourneyMessage::showJourney insteadof CombatMessage;
		CombatMessage::showCombatMessage as private;
	}
	
	public function showMessage()
	{
		$this->showCombatMessage();
	}
}