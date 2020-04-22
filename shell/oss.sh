#!/bin/bash
# 接收参数
src=$(date +%Y%m%d)
bucket=test
type=video
ext=mp4

# 遍历文件
for file in $(ls "$src" | grep "\.$ext") ; do
  # 计算文件名
  name="$(echo -n "${file//.$ext/}" | md5sum | cut -d " " -f1)"

  # 修改文件名
  mv "$src"/"$file" "$src"/v2_"$name"_"$type"_"$ext"
done

# 上传文件
#ossutil cp "$src" oss://"$bucket"/"$src" --include "_$ext" -r
