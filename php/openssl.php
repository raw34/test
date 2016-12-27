<?php

//data you want to sign
$data = 'my data';

//create new private and public key
/* $private_key_res = openssl_pkey_new(array(
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
));

$details = openssl_pkey_get_details($private_key_res);

$public_key_res = openssl_pkey_get_public($details['key']); */

$private_key = file_get_contents(__DIR__ . '/../rsa_private_key.pem');
$public_key = file_get_contents(__DIR__ . '/../rsa_public_key.pem');

$private_key_res = openssl_get_privatekey($private_key);
$public_key_res = openssl_get_publickey($public_key);

//create signature
// openssl_sign($data, $signature, $private_key_res, "sha1WithRSAEncryption");
openssl_sign($data, $signature, $private_key_res);

//verify signature
// $ok = openssl_verify($data, $signature, $public_key_res, OPENSSL_ALGO_SHA1);
$ok = openssl_verify($data, $signature, $public_key_res);

openssl_free_key($public_key_res);

if ($ok == 1) {
    echo "valid\n";
} elseif ($ok == 0) {
    echo "invalid\n";
} else {
    echo "error: ".openssl_error_string()."\n";
}
