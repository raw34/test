package main

import (
	"github.com/golang/mock/gomock"
	"log"
	"testing"
)

func Test_httpGet(t *testing.T) {
	ctrl := gomock.NewController(t)
	ctrl.Finish()
	stub := `{"id":100,"username":"raw34","firstName":"Randy","lastName":"Chang","email":"raw0034@gmail.com","password":"xxxxxx","phone":"100000","userStatus":0}`
	log.Println(stub)
}

func Test_httpPost(t *testing.T) {
}

func Test_httpPut(t *testing.T) {
}

func Test_httpDelete(t *testing.T) {
}

func Test_httpHead(t *testing.T) {
}
