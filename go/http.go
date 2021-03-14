package main

import (
	"io/ioutil"
	"log"
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
	Request netHttp.RequestInterface
	Client netHttp.ClientInterface
	HttpClientInterface
}

func (hc *HttpClient) getRequest() netHttp.RequestInterface {
	if hc.Request != nil {
		return hc.Request
	}

	request := netHttp.Request{}
	hc.Request = &request
	return hc.Request
}

func (hc *HttpClient) SetRequest(request netHttp.RequestInterface)  {
	hc.Request = request
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
	request := hc.getRequest()
	req, _ := request.NewRequest("GET", url, nil)
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