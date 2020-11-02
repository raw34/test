<?php
$arr = [];
echo $arr['a'];

$trace = array_slice(array_reverse(xdebug_get_function_stack()), 3, -1);

