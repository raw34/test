package main

import (
	"bytes"
	"encoding/json"
	"github.com/golang/mock/gomock"
	"github.com/stretchr/testify/assert"
	"io"
	"io/ioutil"
	"log"
	"net/http"
	"net/http/httptest"
	netHttp "raw34/test/go/net/http"
	"testing"
)

func Test_httpGet(t *testing.T) {
	method := "GET"
	url := "https://petstore.swagger.io/v2/user/raw34"
	bodyStringStub := `{"id":100,"username":"raw34","firstName":"Randy","lastName":"Chang","email":"raw0034@gmail.com","password":"xxxxxx","phone":"100000","userStatus":0}`

	ctrl := gomock.NewController(t)
	ctrl.Finish()

	ioReadCloserStub := ioutil.NopCloser(bytes.NewReader([]byte(bodyStringStub)))
	responseStub := &http.Response{}
	responseStub.Body = ioReadCloserStub

	clientMock := netHttp.NewMockClientInterface(ctrl)
	clientMock.EXPECT().DoRequest(method, url, nil).Return(responseStub, nil)

	httpClient := &HttpClient{}
	httpClient.setClient(clientMock)

	res := httpClient.Get(url)

	assert.Equal(t, bodyStringStub, res)
}

func Test_httpPost(t *testing.T) {
}

func Test_httpPut(t *testing.T) {
}

func Test_httpDelete(t *testing.T) {
}

func Test_httpHead(t *testing.T) {
}

func Test_HttpMockServer(t *testing.T) {
	ts := httptest.NewServer(http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		res := map[string]interface{}{"code": 0, "message": "", "data": map[string]interface{}{"a":"fff"}}
		jsonRes, _ := json.Marshal(res)
		w.WriteHeader(http.StatusOK)
		w.Write(jsonRes)
	}))
	defer ts.Close()

	api := ts.URL
	log.Println("api", api)

	res, err := http.Get(ts.URL)
	if err != nil {
		log.Fatalln("err", err)
	}

	body, err := io.ReadAll(res.Body)
	res.Body.Close()
	if err != nil {
		log.Fatal(err)
	}

	assert.Equal(t, `{"code":0,"data":{"a":"fff"},"message":""}`, string(body))
}