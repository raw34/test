#!/bin/bash

str1="nohup ls"
str2='ff'

if [[ "$str1" == "fnohup" ]]  || [[ "$str2" == "ff" ]]; then
    echo 1
    echo $str1
else
    echo 0
fi
