<?php 
$agent = $_SERVER['HTTP_USER_AGENT'];
$delimiter = strpos($agent, 'Mac OS') === false ? ',' : ';';

$data = array(
    array('id', 'name', 'age'),
    array(1, 'lucy', '20'),
    array(2, '韩梅梅', 20),
    array(3, '李雷', 20),
);

$output = '';

foreach ($data as $v) {
    $output .= implode($delimiter, $v) . "\n";
}

$output = iconv('UTF-8', 'GBK', $output);


$name = 'test';

//$type = 'text/html';
$type = 'application/octet-stream';

//$charset = 'GBK';
//$charset = 'UTF-8';

//echo $output;die();

//$output =  chr(0XEF) . chr(0xBB) . chr(0XBF) . $output;

//header("Content-Type: $type; charset=$charset");
header("Content-Type: $type;");

//echo $output;die();

header("Accept-Ranges: bytes");
header("Accept-Length: " . strlen($output));
header("Content-Disposition: attachment; filename=$name.csv");

//echo chr(0XEF) . chr(0xBB) . chr(0XBF);
echo $output;

