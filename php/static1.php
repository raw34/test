<?php

/**
 * Class static1
 * @author Randy Chang
 */
class static1
{
    public function hello(): void
    {
        echo 'world', "\n";
    }

    public static function staticHello(): void
    {
        echo 'static world', "\n";
    }
}
$obj = new static1();

// warning
static1::hello();
$obj->hello();

static1::staticHello();
// no warning
$obj->staticHello();
