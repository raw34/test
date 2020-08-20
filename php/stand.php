<?php
//标准差
function getStand($arr = []){
    if (empty($arr)) {
        return 0;
    }
    //（每个数字-均值）的平方加起来 再除以数字个数 再开方

    // 求元素个数
    $total = count($arr);
    echo "total = $total\n";

    // 求数组元素平均值
    $sum = array_sum($arr);
    $av = $sum / $total;
    echo "av = $av\n";

    // 求每个数字加权和
    $stand = 0;
    foreach ($arr as $v) {
        $stand += $v - $av;
    }

    echo "stand1 = $stand\n";

    // 求除元素个数后的值
    $stand /= $total;
    echo "stand2 = $stand\n";

    // 求开方值
    $stand = sqrt($stand);
    echo "stand3 = $stand\n";

    return $stand;
}

echo getStand([1, 2, 3, 4, 500000, 5, 2000]);