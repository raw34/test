#!/bin/bash

str1="nohup ls"

if [[ "$str1" =~ "nohup" ]]; then
    echo 1
    echo $str1
else
    echo 0
fi
