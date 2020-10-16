<?php

/**
 * Class Polymorphism
 * @author Randy Chang
 */
class Polymorphism
{
    public static function test() :void
    {
        $cat = new Cat();

        $cat->eat();
        $cat->sleep();
        $cat->work();
    }
}

/**
 * Class Animal
 * @author Randy Chang
 */
class Animal
{
    public function eat() :void
    {
        $this->sleep();
        echo 'basic eat', "\n";
    }

    public function sleep() :void
    {
        echo 'basic sleep', "\n";
    }

    public function work() :void
    {
        echo 'basic work', "\n";
    }
}

/**
 * Class Cat
 * @author Randy Chang
 */
class Cat extends Animal
{
    public function eat() :void
    {
        echo 'cat eat', "\n";
    }

    public function sleep() :void
    {
        echo 'cat sleep', "\n";
    }

    public function work() :void
    {
        echo 'cat work', "\n";
    }
}

Polymorphism::test();

