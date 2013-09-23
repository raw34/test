<?php 
//$filename = 'test.txt';
$filename = 'test.png';
//$somecontent = "添加这些文字到文件\n";

$qrcode = 'http://api.qrserver.com/v1/create-qr-code/?size=100x100&data=http://weibo.com/raw34';
$somecontent = file_get_contents($qrcode);

// 首先我们要确定文件存在并且可写。
//if (is_writable($filename)) {

    // 在这个例子里，我们将使用添加模式打开$filename，
    // 因此，文件指针将会在文件的末尾，
    // 那就是当我们使用fwrite()的时候，$somecontent将要写入的地方。
    if (!$handle = fopen($filename, 'a')) {
         echo "不能打开文件 $filename";
         exit;
    }

    // 将$somecontent写入到我们打开的文件中。
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "不能写入到文件 $filename";
        exit;
    }

    echo "成功地将 $somecontent 写入到文件 $filename";

    fclose($handle);

//} else {
//    echo "文件 $filename 不可写";
//}
?>
