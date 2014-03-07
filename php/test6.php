<?php
require_once '../../Pinyin/PyDict.php';
require_once '../../Pinyin/Pinyin.php';

$file = fopen('tags1.csv', 'r');
$tags = array();
while (!feof($file)) {
    $row = fgets($file);
    $arr = explode(',', trim($row));
    $i = 0;
    foreach ($arr as $v) {
        //echo '<br/>', $i, ' = ', $v;
        if (trim($v) != '') {
            $pinyin = Pinyin::getPinyin($v);
            $tags[$i][] = array($v, $pinyin[0]);
        }
        $i++;
    }
}
$json = json_encode($tags);
echo $json;
//echo '<pre>'; var_dump($tags); echo '</pre>';
/*$i = 1;
$j = count($tags) + 1;
foreach ($tags as $v) {
    
}
 */
?>
