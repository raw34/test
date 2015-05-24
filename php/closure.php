<?php
function getCounter() {
    $i = 0;
    echo 'out ', $i, "\n";
    return function() use($i) { // 这里如果使用引用传入变量: use(&$i)
        echo ++$i, "\n";
    };
}

$counter = getCounter();
$counter(); // 1
$counter(); // 1)}}>

