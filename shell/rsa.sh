#!/bin/bash

ori_file=./pass.txt
pub_key=../rsa_public_key.pem
pri_key=../rsa_private_key.pem

# encode by public key
openssl rsautl -encrypt -in "${ori_file}" -out ./rsa/test_enc.txt -inkey "${pub_key}" -pubin

# decode by private key
openssl rsautl -decrypt -in ./rsa/test_enc.txt -out ./rsa/test_dec.txt -inkey "${pri_key}"

# sign by private key
openssl rsautl -sign -in "${ori_file}" -out ./rsa/test_sig.txt -inkey "${pri_key}"

# verify by public key
openssl rsautl -verify -in ./rsa/test_sig.txt -out ./rsa/test_vfy.txt -inkey "${pub_key}" -pubin