#!/bin/basho

#定义变量
srcdir="/Users/randy/wwwroot/repo/git-test/sh"
user="changle"
host="192.168.253.201"
port="22"
destdir="/home/changle/git-test/sh"

options=(-av -e "ssh -p $port")

if [[ $srcdir == $(pwd) ]]; then
    # echo 'in srcdir'

    #sshkey初始化
    if [[ ! -f ~/.ssh/id_rsa.pub ]]; then
        # echo 'no sshkey'
        ssh-keygen -t rsa
    fi

    #拷贝sshkey
    cp ~/.ssh/id_rsa.pub $srcdir/

    #上传
    rsync $options $srcdir/ $user@$host:$destdir/

    #执行远程脚本
    ssh -p $port $user@$host sh $destdir/deploy.sh

    #删除sshkey
    if [[ -f $srcdir/id_rsa.pub ]]; then
        rm $srcdir/id_rsa.pub
    fi
else
    cd $destdir
    # echo 'in destdir'

    #存储sshkey
    cat id_rsa.pub >> ~/.ssh/authorized_keys

    #改权限
    chmod +x deploy.sh

    #删除sshkey
    if [[ -f $destdir/id_rsa.pub ]]; then
        rm $destdir/id_rsa.pub
    fi
fi 

