<?php 
/**
 * test
 */
class Test
{
    public static $num = 10;
    protected static $car = 20;
    protected $id = 2;
    //public $car;
    private $item;
    /**
     * 
     */
    public function __construct()
    {
        $this->item = 10;
        self::$num = 50;
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
        echo "\nthis->car = ", self::$car;
        echo "\nparent->car = ", parent::$car;
        echo "\nid = ", $this->id;
    }
}

echo "\n", Test::$num;
$obj = new Test();
echo "\n", Test::$num;
new Test1();
