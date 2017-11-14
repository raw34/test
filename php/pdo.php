<?php
$dbms = 'mysql';     //数据库类型
$host = 'localhost'; //数据库主机名
$dbName = 'passport';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = '';          //对应的密码
$dsn = $dbms . ':host=' . $host . ';dbname=' . $dbName;

$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象

$file_input = '../users_20171110.txt';

$i = 0;

$ids = [];

$fh = fopen($file_input, 'r');

while (!feof($fh)) {
    $line = fgets($fh);
    // echo $line;

    $ids[] = (integer) $line;

    if (count($ids) == 5000) {
        $sql = 'select id, phone, email, created_at from account_main where id in (' . implode(',', $ids) . ') and phone is not null order by created_at';
        $ret = $dbh->query($sql);

        while ($row = $ret->fetch()) {
            error_log($row['id'] . ',' . $row['phone'] . ',' . $row['email'] . ',' . $row['created_at'] . "\n", 3, '../users_' . date('Ymd') . '_out.txt');
        }

        $ids = [];
    }

    $i++;
}

// 默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
// $db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
