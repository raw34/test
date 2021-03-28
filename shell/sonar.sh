#!/bin/bash

# 获取参数
project="dsp3"
branch="b_5195_20200703_dsp"
date="2020-07-03"
host="http://localhost:9000"
token="2f739458dca13bfeaa6791ce49cb0ecaa80d7bc0"

while getopts ":b:d:h:p:t:" optname
do
    case "$optname" in
        "b")
            branch=$OPTARG
            ;;
        "d")
            date=$OPTARG
            ;;
        "h")
            host=$OPTARG
            ;;
        "p")
            project=$OPTARG
            ;;
        "t")
            token=$OPTARG
            ;;
         *)
           echo "usage: $0 [-b] [-d] [-h] [-p] [-t]" >&2
           exit 1
    esac
done

if [[ ${branch} == "" || ${date} == "" || ${project} == "" || ${token} == "" ]]; then
    echo "Option b and d and t is required!"
    exit 1
fi

# 切换到目标分支
git checkout "${branch}"

# 切换到分支创建前commit
commit=$(git log --pretty=format:"%h" --before="${date} 00:00:00" | head -1)
git checkout "${commit}"

# 执行sonar分析并上报
sonar-scanner -Dsonar.projectKey="${project}" -Dsonar.sources=. -Dsonar.host.url="${host}" -Dsonar.login="${token}"

# 切换到目标分支
git checkout "${branch}"

# 执行sonar分析并上报
sonar-scanner -Dsonar.projectKey="${project}" -Dsonar.sources=. -Dsonar.host.url="${host}" -Dsonar.login="${token}"
