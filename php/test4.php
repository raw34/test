<?php 
//$res = file_get_contents('http://photo.auto.sina.com.cn/interface/general/get_new_HD_by_type.php?type=18&limit=5&format=json&um_index=yes');
//echo $res;

$a = array(
    1=>5,
    5=>8,
    22,
    2=>'8'
    ,81);
echo $a[7];
echo $a[6];
echo $a[3];

//echo 1>>0;
//echo 2>>1;
echo 3<<2;

/*
 include "mms://www.abc.com/a.php";
 include "http://www.abc.com/a.php";
 include "https://www.abc.com/a.php";
 include "ftp://www.abc.com/home/a.php";
 */
function quick_sort($array) {
    if (count($array) <= 1) {
        return $array;
    }
    $key = $array[0];
    $left_arr = array();
    $right_arr = array();
    for ($i=1; $i<count($array); $i++) {
        if ($array[$i] <= $key) {
            $left_arr[] = $array[$i];
        } else {
            $right_arr[] = $array[$i];
        }
    }
    $left_arr = quick_sort($left_arr);
    $right_arr = quick_sort($right_arr);
    return array_merge($left_arr, array($key), $right_arr);
}
$arr1 = array(1, 3);
$arr2 = array(2, 4);
$arr3 = $arr1 + $arr2;
print_r($arr3);

echo 'aa' + 'bb';

for($i=0;$i<10;$i++){
    $sum+=0.1;
    echo '<br/>', $sum;
}
echo '<br/>sum = ', $sum;
echo '<br/>sum = ', (int) $sum;
?>
