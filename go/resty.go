package main

import (
	"log"
	"raw34.xyz/test/go/resty"
)

func restyGet(url string)  {
	client := resty.Client{}

	resp, err := client.SetHeader("Accept", "application/json").Get(url)

	if err != nil {
		log.Println(err)
		panic(err.Error())
	}

	log.Println(resp)
}