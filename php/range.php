<?php

$begin = time();

for ($i = 0; $i < 1000000000000; $i+=1000) {
    echo $i, "\n";
}

$end = time();

echo $end - $begin;