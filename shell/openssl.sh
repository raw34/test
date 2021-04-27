#!/bin/bash

ori_file=./test.txt
pub_key=../rsa_public_key.pem
pri_key=../rsa_private_key.pem

pub_encode_file=./crypt/test_enc_rsa.txt
pub_decode_file=./crypt/test_dec_rsa.txt
pri_encode_file=./crypt/test_sig_rsa.txt
pri_decode_file=./crypt/test_vfy_rsa.txt

# encode by public key
openssl rsautl -encrypt -in "${ori_file}" -out "${pub_encode_file}" -inkey "${pub_key}" -pubin

# decode by private key
openssl rsautl -decrypt -in "${pub_encode_file}" -out "${pub_decode_file}" -inkey "${pri_key}"

# sign by private key
openssl rsautl -sign -in "${ori_file}" -out "${pri_encode_file}" -inkey "${pri_key}"

# verify by public key
openssl rsautl -verify -in "${pri_encode_file}" -out "${pri_decode_file}" -inkey "${pub_key}" -pubin