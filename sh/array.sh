#!/bin/bash

arr1=([test]=111 [develop]=222)

echo ${arr1[@]}

arr1=(1 2 3 4)

echo ${arr[0]}

declare -A phone
phone=([jim]="135" [tom]="136" [lucy]="158" )

echo ${phone[jim]}


# for key in ${!phone[*]}
# do
    # echo "$key -> ${phone[$key]}"
# done

declare -A dict=([a]="123" [b]="1234" )

echo ${dict[b]}

declare -A dict1
dict1[a]='
    x=1
    y=2
    z=3
'
# dict1[b]='x=4 y=5 z=6'

# echo ${dict1[a]}

for tmp in ${dict1[@]} ; do
    for k in ${tmp[@]} ; do
        list=(${k//=/ })
        echo ${list[1]} 
    done
done


arr3=(
"c1"
"c2"
"c3"
"c4"
)

echo ${arr3[0]}

