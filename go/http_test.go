package main

import (
	"bytes"
	"github.com/golang/mock/gomock"
	"github.com/stretchr/testify/assert"
	"io/ioutil"
	"net/http"
	netHttp "raw34.xyz/test/go/net/http"
	"testing"
)

func Test_httpGet(t *testing.T) {
	method := "GET"
	url := "https://petstore.swagger.io/v2/user/raw34"
	stubBodyString := `{"id":100,"username":"raw34","firstName":"Randy","lastName":"Chang","email":"raw0034@gmail.com","password":"xxxxxx","phone":"100000","userStatus":0}`

	ctrl := gomock.NewController(t)
	ctrl.Finish()

	ioReadCloserStub := ioutil.NopCloser(bytes.NewReader([]byte(stubBodyString)))
	responseStub := &http.Response{}
	responseStub.Body = ioReadCloserStub

	clientMock := netHttp.NewMockClientInterface(ctrl)
	clientMock.EXPECT().DoRequest(method, url, nil).Return(responseStub, nil)

	httpClient := &HttpClient{}
	httpClient.SetClient(clientMock)

	res := httpClient.Get(url)

	assert.Equal(t, stubBodyString, res)
}

func Test_httpPost(t *testing.T) {
}

func Test_httpPut(t *testing.T) {
}

func Test_httpDelete(t *testing.T) {
}

func Test_httpHead(t *testing.T) {
}
