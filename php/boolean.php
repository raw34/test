<?php 
echo "<pre>"; var_dump($argv); echo "</pre>";
//echo $argv[0]; 


$a1 = null; 
$a2 = false; 
$a3 = 0; 
$a4 = ""; 
$a5 = "0"; 
$a6 = "null"; 
$a7 = array(); 
$a8 = array(array()); 

echo empty($a1) ? "true\n" : "false\n"; 
echo empty($a2) ? "true\n" : "false\n"; 
echo empty($a3) ? "true\n" : "false\n"; 
echo empty($a4) ? "true\n" : "false\n"; 
echo empty($a5) ? "true\n" : "false\n"; 
echo empty($a6) ? "true\n" : "false\n"; 
echo empty($a7) ? "true\n" : "false\n"; 
echo empty($a8) ? "true\n" : "false\n"; 
echo isset($a1) ? "true\n" : "false\n"; 


if ($a1 === $a3) {
    echo 0, "= null";
}

$data_trade = [
    'status' => null,
];
if (isset($data_trade['status'])) {
    echo 1;
} else {
    echo 0;
}
die();

$trade_status = null;
if (isset($this->tradeStatus[$trade_status])) {
    echo 1;
} else {
    echo 0;
}
die();

