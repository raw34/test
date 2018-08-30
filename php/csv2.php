<?php

$file = 'csv.txt';

$distinct_ids = [];

$resource = fopen($file, 'r');
$first_arr = fgetcsv($resource);

if (!$first_arr) {
    echo 'column not found';die();
}

array_walk($first_arr, function (&$value, $key) {
    $value = trim($value);
});

$first_arr = array_flip($first_arr);

// echo '<pre>'; var_dump($first_arr); echo '</pre>'; die();

if (!isset($first_arr['device_id'])) {
    echo 'device_id not found';die();
}

$offset = $first_arr['device_id'];

echo 'offset = ', $offset, "\n";

while (!feof($resource)) {
    // $info = fgets($resource);
    /* $info = preg_replace_callback('|"[^"]+"|', function($matches){
        return str_replace(',', '，', $matches[0]);
    }, $info);  */

    // $arr = explode(',', $info);
    $arr = fgetcsv($resource);
    // var_dump($arr);
    if (isset($arr[$offset])) {
        $arr[$offset] = isset($arr[$offset]) ? trim($arr[$offset]) : '';
        $distinct_ids[] = $arr[$offset];
    }
}

$distinct_ids = array_keys(array_flip($distinct_ids));

echo '<pre>'; var_dump($distinct_ids); echo '</pre>'; die();
