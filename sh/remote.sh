#!/bin/bash

remotecmd="export PATH=$PATH"

remotecmd="$remotecmd \
    && find . -maxdepth 1 -ctime +30 | xargs rm -rf "

echo $remotecmd

