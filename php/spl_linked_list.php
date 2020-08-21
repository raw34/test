<?php
$arr = range(1, 10);

//SplDoublyLinkedList
$list = new SplDoublyLinkedList();

foreach ($arr as $v) {
    $list->push($v);
}

$list->rewind();

echo "array last/top value " .  $list->top() ." \n";
echo "array count value " .  $list->count() ." \n";
echo "array first/top value " . $list->bottom() . " \n";

while ($list->valid()) { //check with valid method
    echo 'key ', $list->key(), ' value ', $list->current(),"\n"; //key and current method use here
    $list->next(); //next method use here
}

echo "pop array got value ", $list->pop(), "\n";
echo "shift array got value ", $list->shift(), "\n";

//SplPriorityQueue
//SplFixedArray
//SplObjectStorage