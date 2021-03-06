#!/bin/sh


log_dir="/tmp/log/www/dsp"
file_dir="${HOME}/Downloads"
file_name="${log_dir}/big_files_$(date +%Y%m%d%H).log"

mkdir -p "${log_dir}"

find "${file_dir}" -type f -size +100M  -print0 | xargs -0 du -h | sort -nr > "${file_name}"