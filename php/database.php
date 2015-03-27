<?php 
//mysql
//$dbh = mysql_connect();

$dbh = new PDO('mysql:host=127.0.0.1;port=33060;dbname=krplus_audit', 'krplus', 'krplus', array( PDO::ATTR_PERSISTENT => false));
// $dbh = new PDO('mysql:host=127.0.0.1;port=3306;dbname=krplus_audit', 'krplus', 'krplus', array( PDO::ATTR_PERSISTENT => false));

$sth = $dbh->prepare("SELECT id, created_at FROM users limit 2");
$sth->execute();

$result = $sth->fetchAll();

echo '<pre>'; var_dump($result); echo '</pre>'; die();
//echo $result[0]['created_at'];
