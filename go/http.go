package main

import (
	"io/ioutil"
	"log"
	"net/http"
)

type Param struct {
	key string
	value interface{}
}

type HttpClient interface {
	SetHeaders(headers map[string]string)
	Head(url string) string
	Get(url string) string
	Post(url string, params map[string]Param) string
	Put(url string, params map[string]Param) string
	Delete(url string) string
}

type HttpClientIml struct {
	HttpClient
}

func (client HttpClientIml) SetHeaders(headers map[string]string) {
}

func (client HttpClientIml) Get(url string) string {
	resp, err := http.Get(url)

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

func (client HttpClientIml) Post(url string, params map[string]Param) string {
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
	return ""
}

func (client HttpClientIml) Put(url string, params map[string]Param) string {
	return ""
}

func (client HttpClientIml) Delete(url string) string {
	return ""
}

func (client HttpClientIml) Head(url string) string {
	return ""
}