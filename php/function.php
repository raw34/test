<?php 
/*
 * 约瑟夫环
 */
function josehpus1($n, $m) {
    $a = array();
    for ($i = 1; $i <= $n; $i++) {
        $a[] = $i;
    }
    $i = 1;
    while (count($a) > 1) {
        $x = array_shift($a);
        if ($i % $m != 0) {
            $a[] = $x;
        } else {
            echo '<br/>- ' . $x . ' = ';
            print_r($a);
        }
        $i++;
    }
    return $a[0];
}

function josehpus2($n, $m) {
    $s = 0;
    for ($i = 2; $i <= $n; $i ++) {
        $s = ($s + $m) % $i;
    }
    return $s + 1;
}

echo josehpus1(10, 7);
echo '<br/>';
echo josehpus2(10, 7);
?>
