<?php

include 'static1.php';

/**
 * Class static2
 * @author Randy Chang
 */
class static2 extends static1
{
    public static function staticHello(): void
    {
        echo 'static world 2', "\n";
    }
}

$obj = new static2();

static2::staticHello();
