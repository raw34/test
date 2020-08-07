<?php
function jo($arr, $m) {
    echo json_encode($arr), "\n";

    $total = count($arr);

    if ($total === 1) {
        return $arr[0];
    }

    $offset = $total < $m ? $m % $total : $m - 1;

    $arr1 = array_slice($arr, $offset + 1, $total - 1);
    $arr2 = array_slice($arr, 0, $offset);

    $arr_new = array_merge($arr1, $arr2);
    
    return jo($arr_new, $m);
}

$n = 10;
$m = 4;
$arr = range(1, $n);

echo jo($arr, $m);
