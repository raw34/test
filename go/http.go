package main

import (
	"io/ioutil"
	"log"
	"net/http"
)

func httpGet() string {
	resp, err := http.Get("https://petstore.swagger.io/v2/user/raw34")

	if err != nil {
		log.Fatal(err)
	}

	defer resp.Body.Close()

	body, err := ioutil.ReadAll(resp.Body)

	if err != nil {
		log.Fatal(err)
	}

	return string(body)
}

func httpPost()  {
	//body := map[string]string{
	//	"id": "100",
	//	"username": "raw34",
	//	"firstName": "Randy",
	//	"lastName": "Chang",
	//	"email": "raw0034@gmail.com",
	//	"password": "xxxxxx",
	//	"phone": "100000",
	//	"userStatus": "0",
	//}
	//log.Println(body)
}

func httpPut()  {
	
}

func httpDelete()  {
	
}

func httpHead()  {
	
}