<?php

class Warrior
{
    public function attack()
    {
        echo "This " . get_class($this) . " caused " . (3 * rand(1,12)) . " points of damage with the double axe." . PHP_EOL;
        return 1;
    }
}
