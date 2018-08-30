<?php
print_r(get_loaded_extensions());

class SegfaultScenario
{
    private $circular_reference;
    private $object;

    public function __construct()
    {
        $this->circular_reference = $this;
        $this->object = new \stdClass();
    }

    public function __destruct()
    {
        // we try to avoid accessing $this->object by returning early but the object exists
        if (!$this->object) { // without this expression involving the object, the segfault does not happen
            var_dump('the object exists');
            return;
        }

        var_dump('segfaults here:');
        // and then access the object (which seemingly has already been garbage collected)
        var_dump($this->object);
        var_dump('will not get here inside');
    }
}

class SomeContainer
{
    public function run()
    {
        new SegfaultScenario();
    }
}

$container = new SomeContainer();
$container->run();

var_dump('we are about to segfault');
gc_collect_cycles();
var_dump('will not get here outside');
