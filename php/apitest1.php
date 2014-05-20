<?php 
$column1 = '降价信息';
$city = '北京';
//$column1 = iconv('GBK', 'UTF-8', $column1);
//$city = iconv('GBK', 'UTF-8', $city);
$api = 'http://platform.sina.com.cn/news/fullsearch?app_key=2367952075&ie=utf-8&hl=false&noHighlight&page=0&offset=20&pid=33&tid=2&fields=pid,tid,did,url,title,createtime&query=${sp_f2861}:'. $column1 .'%20${sp_f14839}:' . $city;
//$api = 'http://platform.sina.com.cn/news/fullsearch?app_key=2367952075&ie=utf-8&hl=false&noHighlight&page=0&offset=20&pid=1442&tid=34&fields=pid,tid,did,url,title,createtime&query=${sp_f512}:shcs';
#$api = urlencode($api);
$res = file_get_contents($api);
echo $res;

echo trim('sss北京', 'sss');
?>
