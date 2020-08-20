<?php

// 获取中位数
function getMid($arr = []){
    if (empty($arr)) {
        return $arr;
    }

    // 对数组排序
    sort($arr);

    // 求中位数索引
    $index = (int) (count($arr) / 2);

    return $arr[$index];
}

var_dump(3 === getMid([1, 3, 4]));
var_dump(3 === getMid([1, 2, 3, 4, 5]));
var_dump(4 === getMid([1, 2, 3, 4, 5, 6]));



/*
// 单发消息
select id, content, ctime from msg where user_id = 300 order by id limit 10;

// 群发消息
select id, content, ctime from msg_multi where ctime > $ctime;

// 未读消息数
// 单条未读数
select count(*) from msg where id not in (select msg_id from msg_user where type = 'single' and user_id = 300);
// 群发未读数
select count(*) from msg_multi where id not in(select msg_id from msg_user where type = 'multi' and user_id = 300);

select id from msg where id not in (select msg_id from msg_user where type = 'single' and user_id = 300);

select id from msg_multi where id not in(select msg_id from msg_user where type = 'multi' and user_id = 300);

*/