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

/*
echo josephus1(10, 7);
echo '<br/>';
echo josephus2(10, 7);
 */

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

/*
$a = range(1, 10);
shuffle($a);
echo '<pre>'; var_dump($a); echo '</pre>';
echo "\n", implode(' ', $a);
$a = bubble_sort($a);
echo '<pre>'; var_dump($a); echo '</pre>';
echo "\n", implode(' ', $a);


echo 'hostname = ', gethostname();
 */

function binarySearch($arr, $start, $end, $value) {
    $mid = $start + floor(($end - $start) / 2);
    //$mid = floor(($start + $end) / 2);
    echo "\nstart = ", $start, " end = ", $end, " mid = ", $mid, " value = ", $value, " arr[mid] = ", $arr[$mid];
    sleep(1);
    if ($start > $end) {
        return -1;
    } else {
        if ($arr[$mid] == $value) {
            return $mid;
        } elseif ($arr[$mid] > $value) {
            //echo "\narr[mid] = {$arr[$mid]} > value = 7";
            return binarySearch($arr, $start, $mid - 1, $value);
        } else {
            //echo "\narr[mid] = {$arr[$mid]} < value = 7";
            return binarySearch($arr, $mid, $end, $value);
        }
    }
}

/*
$arr = range(1, 10);
//shuffle($arr);
print_r($arr);
$index = binarySearch($arr, 0, 9, 1);
echo "\nindex = ", $index;
 */

function merge_sort($a) {
    $size = count($a);
    if ($size > 1) {
        $mid = intval($size >> 1);
        $left = merge_sort(array_slice($a, 0, $mid));
        $right = merge_sort(array_slice($a, $mid, $size));
        //echo "\nl = ", implode(' ', $left);
        //echo "\nr =", implode(' ', $right);
        $i = $j = 0;
        for ($k = 0; $k < $size; $k++) {
            //echo "\nk = $k, i = $i, j = $j";
            if (isset($left[$i]) || isset($right[$j])) {
                if (!isset($right[$j]) || isset($left[$i]) && $left[$i] <= $right[$j]) {
                    $a[$k] = $left[$i];
                    $i++;
                } else {
                    $a[$k] = $right[$j];
                    $j++;
                }
            }
        }
    }
    return $a;
}

$a = range(1, 10);
shuffle($a);
echo "\n", implode(' ', $a);
$a = merge_sort($a);
echo "\n", implode(' ', $a);
