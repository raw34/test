<?php 

/* $api = 'http://data.auto.sina.com.cn/car/api/get_subbrand_info.php?product=1&format=json&subbrand_id=669'; */
// $res = file_get_contents($api);
// //echo $res;
// $res = iconv('GBK', 'UTF-8', $res);
// $hash = json_decode($res, true);

// //echo '<pre>'; var_dump($hash); echo '</pre>';
// $price = $hash{'subbrand_data'}{'price_area'};
// echo $price;
// $price .= '万万万';
// $price = preg_replace('/[万元]/', '', $price);
// echo $price;


echo json_encode(['id' => 11, 'name' => 'xxxx'], JSON_PRETTY_PRINT);
