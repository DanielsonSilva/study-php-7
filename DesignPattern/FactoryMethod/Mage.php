<?php

class Mage
{
    public function attack()
    {
        echo "This " . get_class($this) . " caused " . (3 * rand(1,12)) . " points of damage with a fireball." . PHP_EOL;
        return 1;
    }
}
