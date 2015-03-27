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
