<?php
class myIterator implements Iterator {
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );  

    public function __construct() {
        $this->position = 0;
    }

    function rewind() {
        //var_dump(__METHOD__);
        //echo '<br/>';
        $this->position = 0;
    }

    function current() {
        //var_dump(__METHOD__);
        //echo '<br/>';
        return $this->array[$this->position];
    }

    function key() {
        //var_dump(__METHOD__);
        //echo '<br/>';
        return $this->position;
    }

    function next() {
        //var_dump(__METHOD__);
        //echo '<br/>';
        ++$this->position;
    }

    function valid() {
        //var_dump(__METHOD__);
        //echo '<br/>';
        return isset($this->array[$this->position]);
    }
}

$it = new myIterator;

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo '<br/>';
}

$it->rewind();

while ($it->valid()) {
    $key = $it->key();    
    $value = $it->current();
    var_dump($key, $value);
    echo '<br/>';
    $it->next();
}

$items = new ArrayObject(range('a', 'j'));
$it = $items->getIterator();
foreach ($it as $k => $v) {
    var_dump($k, $v); 
    echo '<br/>';
}
