<?php 
/**
 * test
 */
class Test
{
    static protected $car = 20;
    //public $car;
    private $item;
    /**
     * 
     */
    public function __construct()
    {
        $this->item = 10;
        //$this->car = 20;
    }
}
//$obj = new Test();
//echo '<pre>'; var_dump($obj); echo '</pre>';
/**
 * test1
 */
class Test1 extends Test
{
    /**
     * 
     */
    public function __construct()
    {
        //$this->car = 30;
        self::$car = 30;
        echo 'this->car = ', self::$car, ' parent->car = ', parent::$car;
    }
}

new Test1();
