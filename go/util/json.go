package util

import (
	"encoding/json"
	"log"
	"raw34/test/go/syntax"
)

type User2 struct {
	Id int
	Name string
	Occupation string
}

func json1()  {
	data := syntax.User{
		100,
		"raw34",
		"Randy",
		"Chang",
		"raw0034@gmail.com",
		"xxxxxx",
		"100000",
		0,
	}

	dataJson, err := json.Marshal(data)

	if err != nil {
		log.Fatalln(err)
	}

	log.Println(string(dataJson))
}

func json2()  {
	dataString := `
	{
		"id": 100,
		"username": "raw34",
		"firstName": "Randy",
		"lastName": "Chang",
		"email": "raw0034@gmail.com",
		"password": "xxxxxx",
		"phone": "100000",
		"userStatus": 0
	}`

	dataJson := syntax.User{}

	err := json.Unmarshal([]byte(dataString), &dataJson)

	if err != nil {
		log.Fatalln(err)
	}

	log.Println(dataJson)
}