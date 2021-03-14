package main

import (
	"github.com/stretchr/testify/assert"
	"raw34.xyz/test/go/net/http"
	"testing"
)

func Test_httpGet(t *testing.T) {
	url := "https://petstore.swagger.io/v2/user/raw34"
	client := &HttpClient{}
	client.SetClient(&http.ClientMock{})

	res := client.Get(url)

	assert.Equal(t, nil, res)
	//stub := `{"id":100,"username":"raw34","firstName":"Randy","lastName":"Chang","email":"raw0034@gmail.com","password":"xxxxxx","phone":"100000","userStatus":0}`
	//log.Println(stub)
}

func Test_httpPost(t *testing.T) {
}

func Test_httpPut(t *testing.T) {
}

func Test_httpDelete(t *testing.T) {
}

func Test_httpHead(t *testing.T) {
}
