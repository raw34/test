package main

import (
	"github.com/golang/mock/gomock"
	"github.com/stretchr/testify/assert"
	"net/http"
	"raw34.xyz/test/go/io"
	netHttp "raw34.xyz/test/go/net/http"
	"testing"
)

func Test_httpGet(t *testing.T) {
	url := "https://petstore.swagger.io/v2/user/raw34"

	ctrl := gomock.NewController(t)
	ctrl.Finish()
	requestStub, _ := http.NewRequest("GET", url, nil)
	ioReadCloserMock := io.NewMockReadCloser(ctrl)
	ioReadCloserMock.EXPECT().Read(nil).Return(nil)
	ioReadCloserMock.EXPECT().Close().Return()
	responseStub := &http.Response{}
	responseStub.Body = ioReadCloserMock
	clientMock := netHttp.NewMockClientInterface(ctrl)
	clientMock.EXPECT().Do(requestStub).Return(responseStub, nil)

	httpClient := HttpClient{}
	httpClient.SetClient(clientMock)

	res := httpClient.Get(url)

	assert.Equal(t, nil, res)
	//stub := `{"id":100,"username":"raw34","firstName":"Randy","lastName":"Chang","email":"raw0034@gmail.com","password":"xxxxxx","phone":"100000","userStatus":0}` log.Println(stub)
}

func Test_httpPost(t *testing.T) {
}

func Test_httpPut(t *testing.T) {
}

func Test_httpDelete(t *testing.T) {
}

func Test_httpHead(t *testing.T) {
}
