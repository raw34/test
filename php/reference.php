<?php

$stack = [
    [
        "function" => "call_user_func_array:[/www/julive-php-vendor/yiisoft/yii2/base/InlineAction.php:55]",
        "file" => "/www/julive-php-vendor/yiisoft/yii2/base/InlineAction.php",
        "line" => 55,
        "params" => []
    ],
    [
        "function" => "runWithParams",
        "type" => "dynamic",
        "class" => "yii\\base\\InlineAction",
        "file" => "/www/julive-php-vendor/yiisoft/yii2/base/Controller.php",
        "line" => 151,
        "params" => []
    ],
    [
        "function" => "runAction",
        "type" => "dynamic",
        "class" => "console\\controllers\\dsp\\AsyncPullTaskController",
        "file" => "/www/julive-php-vendor/yiisoft/yii2/console/Controller.php",
        "line" => 91,
        "params" => []
    ],
    [
        "function" => "runAction",
        "type" => "dynamic",
        "class" => "console\\controllers\\dsp\\AsyncPullTaskController",
        "file" => "/www/julive-php-vendor/yiisoft/yii2/base/Module.php",
        "line" => 455,
        "params" => []
    ],
    [
        "function" => "runAction",
        "type" => "dynamic",
        "class" => "yii\\console\\Application",
        "file" => "/www/julive-php-vendor/yiisoft/yii2/console/Application.php",
        "line" => 161,
        "params" => []
    ],
    [
        "function" => "runAction",
        "type" => "dynamic",
        "class" => "yii\\console\\Application",
        "file" => "/www/julive-php-vendor/yiisoft/yii2/console/Application.php",
        "line" => 137,
        "params" => []
    ],
    [
        "function" => "handleRequest",
        "type" => "dynamic",
        "class" => "yii\\console\\Application",
        "file" => "/www/julive-php-vendor/yiisoft/yii2/base/Application.php",
        "line" => 375,
        "params" => []
    ],
    [
        "function" => "run",
        "type" => "dynamic",
        "class" => "yii\\console\\Application",
        "file" => "/www/julive-dsp/yii",
        "line" => 18,
        "params" => []
    ]
];

function use_reference($stack)
{
    foreach ($stack as &$item) {
        $item['label'] = 1;
    }
    
    var_dump($stack);
    echo "\n";
}


function unuse_reference($stack)
{
    $result = [];
    foreach ($stack as $item) {
        $item['label'] = 1;
        $result[] = $item;
    }

    var_dump($result);
    echo "\n";
}

use_reference($stack);
unuse_reference($stack);
