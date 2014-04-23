<?php 

$city_info = array(
    "column2" => "sp_f512",
    "content" => "sp_f543",
    "name" => "昆明",
    "author" => "sp_f1750",
    "brand" => "sp_f515",
    "domain_ori" => "http://auto.city.sina.com.cn/km/auto/",
    "subbrand_f" => "sp_f519",
    "domain" => "http://km.auto.sina.com.cn/",
    "group" => "sp_f517",
    "t_id" => "34",
    "media" => "sp_f514",
    "subbrand_i" => "sp_f520",
    "p_id" => "1442"
);

$api = 'http://data.auto.sina.com.cn/interface/get_city_news.php?page=1&limit=10&pid=53&cid=01';
$res = file_get_contents($api);

$domain = $city_info['domain'];
$domain_ori = $city_info['domain_ori'];
//preg_replace('#\.#', '\\.', $domain);
//preg_replace('#\.#', '\\.', $domain_ori);
echo $domain;

//$res = preg_replace("#$domain_ori#", $domain, $res);
$res = preg_replace("#$domain_ori#", $domain, $res);
//$res = preg_replace("#http://auto\.city\.sina\.com\.cn/km/auto/#", "http://km.auto.sina.com.cn/", $res);
//$res = preg_replace("#http://auto.city.sina.com.cn/km/auto/#", "http://km.auto.sina.com.cn/", $res);

echo $res;
?>
