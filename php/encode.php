<?php 
$str1 = '赢·响·力';
//$str1 = json_encode($str1);
$str1 = '"\u8d62\u00b7\u54cd\u00b7\u529b"';
$str1 = json_decode($str1);
echo '<pre>'; var_dump($str1); echo '</pre>';
//$str1 = '影响力';
//$str1 = 'sina';
echo "\n", $str1;
$str1 = iconv('utf-8', 'gbk', $str1);
//$str1 = iconv('gbk', 'utf-8', $str1);
echo "\n", $str1;

$str1 = 'án';
echo "\nord = ", ord($str1);
echo "\n", json_encode($str1);

for ($i = 129; $i < 200; $i++) {
    echo "\nord = ", $i, " chr = ", json_encode(chr($i));
}

$str2 = '脦梅掳虏';

$type = mb_detect_encoding($str2);

echo "\ntype = ", $type;

$str2 = iconv('UTF-8', 'GBK', $str2);

echo "\n", $str2;


