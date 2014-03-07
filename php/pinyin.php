<?php 
require_once '../../Pinyin/PyDict.php';
require_once '../../Pinyin/Pinyin.php';

$request = $_REQUEST['name'];
if (isset($request) && !empty($request)) {
    $array = explode(',', trim($request));
    $response = array('succ' => 'false', 'data' => array());
    $data = array();
    foreach ($array as $v) {
        if (!empty($v)) {
            $pinyin = Pinyin::getPinyin($v);
            $data[$v] = $pinyin[0];
            //$data[] = array($v, $pinyin[0]);
        }
    }
    if (count($data) > 0) {
        $response['succ'] = 'true';
        $response['data'] = $data;
    }
}

$json = json_encode($response);

echo $json;
?>
