package main

import (
	"io/ioutil"
	"log"
	"net/url"
	netHttp "raw34.xyz/test/go/net/http"
	"strings"
)

type Param struct {
	key string
	value interface{}
}

type HttpClientInterface interface {
	SetHeaders(headers map[string]string)
	Head(api string) string
	Get(api string) string
	Post(api string, params map[string]Param) string
	Put(api string, params map[string]Param) string
	Delete(api string) string
}

type HttpClient struct {
	Client netHttp.ClientInterface
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

func (hc *HttpClient) Get(api string) string {
	client := hc.getClient()
	resp, err := client.DoRequest("GET", api, nil)

	if err != nil {
		log.Fatal(err)
	}

	defer resp.Body.Close()

	respBody, err := ioutil.ReadAll(resp.Body)

	if err != nil {
		log.Fatal(err)
	}

	return string(respBody)
}

func (hc *HttpClient) Post(api string, params map[string]string) string {
	data := url.Values{}

	for k, v := range params {
		data.Set(k, v)
	}

	body := strings.NewReader(data.Encode())

	client := hc.getClient()
	resp, err := client.DoRequest("POST", api, body)

	if err != nil {
		log.Fatal(err)
	}

	defer resp.Body.Close()

	respBody, err := ioutil.ReadAll(resp.Body)

	if err != nil {
		log.Fatal(err)
	}

	return string(respBody)
}

func (hc *HttpClient) Put(api string, params map[string]Param) string {
	return ""
}

func (hc *HttpClient) Delete(api string) string {
	return ""
}

func (hc *HttpClient) Head(api string) string {
	return ""
}