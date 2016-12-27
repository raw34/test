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


    private $_optionsMail = array(
        'exchangeName' => 'exchange_mail',
        'routingKey' => 'routing_mail',
        'queueName' => 'queue_mail',
    );

    private $_optionsSMS = array(
        'exchangeName' => 'exchange_short_message',
        'routingKey' => 'routing_short_message',
        'queueName' => 'queue_short_message',
    );

    public function __construct()
    {
        $this->item = 10;
        self::$num = 50;
        //$this->car = 20;
    }

    public function mailCallback()
    {
        return 'mail';
    }

    public function smsCallback()
    {
        return 'sms';
    }

    public function test($type)
    {
        echo 'callback = ', $this->{$type . 'Callback'}();
        $type = ucfirst($type);
        echo 'queue = ', $this->{'_options' . $type}['queueName'];

    }

    public static function callStatic()
    {
        echo self::$num, "\n";
        echo self::$id, "\n";
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


echo "\n";
echo Test::$num;
$obj = new Test();
echo "\n";
echo Test::$num;
new Test1();
echo "\n";
Test::callStatic();
echo "\n";

/*
$obj = new Test();
$obj->test('mail');
 */

/**
 * 
 */
class BaseModel
{
    /**
     * 
     */
    public function __construct()
    {
        
    }

    public function add()
    {
        echo "add in base\n";
        echo get_class($this), "->", __method__, "\n";

        BackendLog::add();
    }
}

/**
 * 
 */
class UserModel extends BaseModel
{
    
    /**
     * 
     */
    public function __construct()
    {
        
    }

}

/**
 * 
 */
class BackendLog
{
    
    /**
     * 
     */
    public function __construct()
    {
        
    }

    public static function add()
    {
        echo "add in log\n";
    }
}


//$user = new UserModel();
//$user->add();


class A {
    public static function who() {
        new static;
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
/*
    public static function test() {
        echo '111';
    }
 */
}

// B::test();
