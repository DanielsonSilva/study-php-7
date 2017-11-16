<?php

require_once("Warrior.php");
require_once("Mage.php");
require_once("Paladin.php");
require_once("Druid.php");

class CharacterPlayer
{
    public static function build($class)
    {
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new Exception("We do not have this class to use.");
        }
    }
}
