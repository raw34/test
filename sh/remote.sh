#!/bin/bash

dirname=`pwd`

remotecmd="export PATH=$PATH"

remotecmd="$remotecmd \
    && find . -name '"$dirname"_*' -maxdepth 1 -ctime +30 | xargs rm -rf "

echo $remotecmd

