<?php
echo mktime(0, 0, 0, 1, 1, 2010);
$arr = array('b1' => 11,'b11' => 11,'b2' => 11,'b13' => 11,'b23' => 11);
ksort($arr);
foreach($arr as $k => $v) {
    echo "\n", $k, '==', $v;
}
?>
