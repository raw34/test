<?php 
$api = 'http://platform.sina.com.cn/news/news?app_key=2872801998&format=json&oe=utf-8&url=http://news.sina.com.cn/c/2010-07-20/152720719337.shtml,http://auto.sina.com.cn/news/2014-07-29/22301313649.shtml';
$res = file_get_contents($api);
$hash = json_decode($res, true);
echo '<pre>'; var_dump($hash); echo '</pre>';
