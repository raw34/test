<?php 
if (!file_exists("file.txt")) {
    touch("file.txt");
}
$fh=fopen('hello.txt','r');
$str='hello!'."\n";
$str.=fread($fh,filesize('hello.txt'));
fclose($fh);

$fh1=fopen('hello.txt','w');
fwrite($fh1,$str);
fclose($fh1);
