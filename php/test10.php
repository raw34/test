<?php 
echo '<pre>'; var_dump($argv); echo '</pre>';
//echo $argv[0]; 


$a1 = null; 
$a2 = false; 
$a3 = 0; 
$a4 = ''; 
$a5 = '0'; 
$a6 = 'null'; 
$a7 = array(); 
$a8 = array(array()); 
echo empty($a1) ?"true":"false"; 
echo empty($a2) ?"true":"false"; 
echo empty($a3) ?"true":"false"; 
echo empty($a4) ?"true":"false"; 
echo empty($a5) ?"true":"false"; 
echo empty($a6) ?"true":"false"; 
echo empty($a7) ?"true":"false"; 
echo empty($a8) ?"true":"false"; 
echo isset($a1)   ?"true":"false"; 
