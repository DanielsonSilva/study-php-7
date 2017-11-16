<?php

class Druid
{
    public function attack()
    {
        echo "This " . get_class($this) . " caused " . (3 * rand(1,12)) . " points of damage with the magic staff." . PHP_EOL;
        return 1;
    }
}
