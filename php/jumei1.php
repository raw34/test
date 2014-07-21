<?php 
function CalcRefundAmount($orderItems, $discountAmount, $refundItems) {
    $price_total = 0;
    foreach ($orderItems as $item) {
        $price_total += $item['price'] * $item['quantity'];
    }
    //echo 'price_total = ', $price_total;
    $discount = $discountAmount / $price_total;
    //echo 'discount = ', $discount, "\n";

    $price_refund = 0;
    foreach ($refundItems as $item) {
        foreach ($item as $key => $value) {
            $price_refund += $orderItems[$key]['price'] * (1 - $discount) * $value;
        }
    }

    return $price_refund;
}

$orderItems = array(
    'ItemA'=>array('price'=>5.0, 'quantity'=>2),
    'ItemB'=>array('price'=>20.0, 'quantity'=>1),
);

$refundItems = array( array('ItemA'=>1) );
$refundItems = array( array('ItemA'=>2, 'ItemB'=>1) );

$res = CalcRefundAmount($orderItems, 10, $refundItems);

echo $res;


function ExplodeLines($text, $columnNames) {
    $hash = array();
    $arr_text = explode("\n", trim($text));
    foreach ($arr_text as $row) {
        if (trim($row)) {
            $arr_row = explode(',', trim($row));
            $hash[] = array(
                $columnNames[0] => $arr_row[0],
                $columnNames[1] => $arr_row[1],
                $columnNames[2] => $arr_row[2],
            );
        }
    }

    return $hash;
}

$text = "

Apple,20,red

Pear,10,yellow

";

$columnNames = array('Fruit', 'Number', 'Color');

$res = ExplodeLines($text, $columnNames);

echo '<pre>'; var_dump($res); echo '</pre>';


