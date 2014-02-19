<?php
$province_hash = array(
    '安徽' => 34 ,
    '北京' => 11 ,
    '重庆' => 50 ,
    '福建' => 35 ,
    '甘肃' => 62 ,
    '广东' => 44 ,
    '广西' => 45 ,
    '贵州' => 52 ,
    '海南' => 46 ,
    '河北' => 13 ,
    '黑龙江' => 23 ,
    '河南' => 41 ,
    '湖北' => 42 ,
    '湖南' => 43 ,
    '内蒙古' => 15 ,
    '江苏' => 32 ,
    '江西' => 36 ,
    '吉林' => 22 ,
    '辽宁' => 21 ,
    '宁夏' => 64 ,
    '青海' => 63 ,
    '山西' => 14 ,
    '山东' => 37 ,
    '上海' => 31 ,
    '四川' => 51 ,
    '天津' => 12 ,
    '西藏' => 54 ,
    '新疆' => 65 ,
    '云南' => 53 ,
    '浙江' => 33 ,
    '陕西' => 61 ,
    '台湾' => 71 ,
    '香港' => 81 ,
    '澳门' => 82 ,
    '海外' => 400 ,
    '其他' => 100 
);
$redis = new redis();  
$redis->connect('localhost', 6379);  
$redis->set('nana', 'kioko');
echo $redis->get('nana');
$redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP);
//$redis->set('serial', array(1,2,3,4));
$redis->set('serial', $province_hash);
$result = $redis->get('serial');
echo '<pre>';
print_r($result);
echo '</pre>';
