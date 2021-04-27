#!/bin/bash

#ori_file=./test.txt
ori_file=./crypt/test_enc_rsa.txt
encode_file=./crypt/test_enc_64.txt
decode_file=./crypt/test_dec_64.txt

# encode string
base64 <<< 123456

# decode string
base64 -D <<< MTIzNDU2Cg==

# encode file
base64 < "${ori_file}" > "${encode_file}"

# decode file
base64 -D < "${encode_file}" > "${decode_file}"

# encode file by openssl
openssl base64 -e -in "${ori_file}" -out "${encode_file}"

# decode file by openssl
openssl base64 -d -in "${encode_file}" -out "${decode_file}"