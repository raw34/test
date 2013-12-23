<?php
$api = 'http://login.pub.sina.com.cn:8080/cgi-bin/gsps/interface.cgi?p_id=33&t_id=865&d_id=6&f_name=sp_f27098&method=array';
$res = file_get_contents($api);
$res = str_replace('\x', '\u', $res);
//echo $res;
$json = json_decode($res);
echo '<pre>'; var_dump($json); echo '</pre>';
$array = array('name' => '人·车·浮世绘');
echo json_encode($array);
?>
