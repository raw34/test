<?php
header('Content-Type:text/html;charset=utf-8;');

echo '<pre>';
echo '查看所有已定义类名';
var_dump(get_declared_classes());
echo '</pre>';

echo '<pre>';
echo '获取类中所有变量';
var_dump(get_class_vars('Datetime'));
echo '</pre>';

echo '<pre>';
echo '获取类中所有方法名';
var_dump(get_class_methods('Datetime'));
echo '</pre>';

echo '<pre>';
echo '查看所有已定义接口';
var_dump(get_declared_interfaces());
echo '</pre>';

echo '<pre>';
echo '获取接口中所有变量';
var_dump(get_class_vars('Iterator'));
echo '</pre>';

echo '<pre>';
echo '获取接口中所有方法名';
var_dump(get_class_methods('Iterator'));
echo '</pre>';
