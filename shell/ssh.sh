#!/bin/bash

cmd="echo hello"
remote_addr=${REMOTE_ADDR:=127.0.0.1}
remote_user="root"

ssh $remote_user@remote_addr "$cmd"