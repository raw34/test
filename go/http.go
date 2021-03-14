package main

import (
	"io/ioutil"
	"log"
	"net/http"
	netHttp "raw34.xyz/test/go/net/http"
)

type Param struct {
	key string
	value interface{}
}

type HttpClientInterface interface {
	SetHeaders(headers map[string]string)
	Head(url string) string
	Get(url string) string
	Post(url string, params map[string]Param) string
	Put(url string, params map[string]Param) string
	Delete(url string) string
}

type HttpClient struct {
	Client netHttp.ClientInterface
	HttpClientInterface
}

func (hc *HttpClient) getClient() netHttp.ClientInterface {
	if  hc.Client != nil {
		return hc.Client
	}

	client := netHttp.Client{}
	hc.Client = &client
	return hc.Client
}

func (hc *HttpClient) SetClient(client netHttp.ClientInterface)  {
	hc.Client = client
}

func (hc *HttpClient) SetHeaders(headers map[string]string) {
}

func (hc *HttpClient) Get(url string) string {
	req, _ := http.NewRequest("GET", url, nil)
	client := hc.getClient()
	resp, err := client.Do(req)

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

func (hc *HttpClient) Post(url string, params map[string]Param) string {
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

func (hc *HttpClient) Put(url string, params map[string]Param) string {
	return ""
}

func (hc *HttpClient) Delete(url string) string {
	return ""
}

func (hc *HttpClient) Head(url string) string {
	return ""
}