#!/bin/bash
# 接收参数
bucket=videos-buket
dest=$(date +%Y%m%d)
src=$(date +%Y%m%d)
ext=mp4
type=video

while getopts ":b:d:e:s:t:" optname
do
  case "$optname" in
    b) bucket=$OPTARG ;;
    d) dest=$OPTARG ;;
    e) ext=$OPTARG ;;
    s) src=$OPTARG ;;
    t) type=$OPTARG ;;
    *) echo "usage: $0 [-b] [-d] [-e] [-t]" ;;
  esac
done

# 遍历文件
for file in $(ls "$src" | grep "\.$ext") ; do
  # 计算文件名
  name="$(echo -n "${file//.$ext/}" | md5sum | cut -d " " -f1)"

  # 计算文件大小
  size="$(wc -c "$src/$file" | sed "s/^ *//" | sed "s/\([0-9]*\) .*/\1/")"

  # 上传文件
  echo "src_name = $file, size = $size, "dest_name = "$dest"/v2_"$name"_"$type"_"$ext" >> "$src"/result.log
  ossutil cp -u -f "$src/$file" oss://"$bucket"/"$dest"/v2_"$name"_"$type"_"$ext"
done
