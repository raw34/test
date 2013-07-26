<?php
header( 'content-type: text/plain' );

Book::enumerate('Book');
Book::$COMIC->read();
read(Book::$EDUCATIONAL);
read(Book::$NOVEL );

class Enum
{
    private $_value;
    protected function __construct($value)
    {
        $this->_value = $value;
    }

    public function getValue()
    {
        return $this->_value;
    }

    protected static function enumerate($class)
    {
        $ref = new ReflectionClass($class);
        $instances = array();

        foreach ( $ref->getStaticProperties() as $name => $value )
        {
            $ref->setStaticPropertyValue( $name, new $class( $value ) );
        }
    }
}

class Book extends Enum
{
    public static $COMIC = 'comic';
    public static $NOVEL = 'novel';
    public static $EDUCATIONAL = 'edu';

    public static function enumerate($class)
    {
        parent::enumerate(__CLASS__);
    }
    public function read()
    {
        echo "\nReading a {$this->getValue()} book\n";
    }
}

function read( Book $book )
{
    echo "\nReading a {$book->getValue()} book\n";
}
