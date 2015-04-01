<?php 
$time1 = DateTime::createFromFormat('Y-m-d H:i:s', '1970-20-00 00:00:00');
$time1 = DateTime::createFromFormat('Y-m-d H:i:s', '0000-00-00 00:00:00');


echo '<pre>'; var_dump($time1); echo '</pre>'; die();
