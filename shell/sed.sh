#!/bin/bash

sed -i '' "s/re/rere/" .file.txt

sed -i '' "s/{{{ENV}}}/test/" .file.txt
sed -i '' "s/{{{DB_HOST}}}/127.0.0.1/" .file.txt
