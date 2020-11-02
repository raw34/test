<?php
//$arr = [];
//echo $arr['a'];

//$trace = array_slice(array_reverse(xdebug_get_function_stack()), 3, -1);

class xdebug {
    function dumpStack($a): void
    {
//        $trace = xdebug_get_function_stack();
        $trace = array_slice(array_reverse(xdebug_get_function_stack()), 3, -1);
        var_dump($trace);
    }

    function fixArray($b): void {
        echo $b['last'];
        $this->dumpStack($b);
    }
}

$s = new xdebug();
$ret = $s->fixArray(array('Derick'));

