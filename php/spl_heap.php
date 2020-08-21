<?php
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

//SplMinHeap
$minHeap = new SplMinHeap();

foreach ($arr as $v) {
    $minHeap->insert($v);
}

$minHeap->rewind();

var_dump($minHeap);

//SplMaxHeap
$maxHeap = new SplMaxHeap();

foreach ($arr as $v) {
    $maxHeap->insert($v);
}

$maxHeap->rewind();

var_dump($maxHeap);