<?php 
/*
 * 约瑟夫环
 */
function josephus1($n, $m) {
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

function josephus2($n, $m) {
    $s = 0;
    for ($i = 2; $i <= $n; $i ++) {
        $s = ($s + $m) % $i;
    }
    return $s + 1;
}

echo josephus1(10, 7);
echo '<br/>';
echo josephus2(10, 7);

//冒泡排序法
function bubble_sort($a) {
    $len = count($a);
    if ($len <= 1) {
        return $a;
    }
    $temp = null;
    for ($i = 0; $i < $len; $i++) {
        for ($j = $len - 1; $j > $i; $j--) {
            if ($a[$j] < $a[$j - 1]) {
                $temp = $a[$j - 1];
                $a[$j - 1] = $a[$j];
                $a[$j] = $temp;
            }
        }
    }
    return $a;
}

$a = range(1, 10);
shuffle($a);
echo '<pre>'; var_dump($a); echo '</pre>';
$a = bubble_sort($a);
echo '<pre>'; var_dump($a); echo '</pre>';


echo 'hostname = ', gethostname();
