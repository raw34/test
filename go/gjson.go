package main

import (
	"github.com/tidwall/gjson"
	"log"
)

func gjson1()  {
	str := `{"name":{"first":"Janet","last":"Prichard"},"age":47}`

	data := gjson.Get(str, "name.last")

	log.Println(data)
}

func gjson2()  {
	str := `{"name":{"first":"Janet","last":"Prichard"},"age":47}`

	m, ok := gjson.Parse(str).Value().(map[string]interface{})

	if !ok {
		log.Println("not a map")
	}

	log.Println(m["name"])
	log.Println(m["age"])
}