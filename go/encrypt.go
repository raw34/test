package main

import (
	"encoding/base64"
	"log"
)

func base64Encode()  {
	data := "ab5d4fcb63b1bcc91c132327060963ac785d28eb"
	res := base64.StdEncoding.EncodeToString([]byte(data))

	log.Println(data, res)
}

func base64Decode()  {
	data := "YWI1ZDRmY2I2M2IxYmNjOTFjMTMyMzI3MDYwOTYzYWM3ODVkMjhlYg=="
	res, _ := base64.StdEncoding.DecodeString(data)

	log.Println(data, string(res))
}