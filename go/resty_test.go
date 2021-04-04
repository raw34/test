package main

import (
	"github.com/jarcoal/httpmock"
	"github.com/stretchr/testify/assert"
	"testing"
)

func Test_restyClient_restySimpleGet(t *testing.T) {
	httpmock.Activate()
	defer httpmock.DeactivateAndReset()

	url := "https://petstore.swagger.io/v2/user/raw34"
	bodyStringStub := `{"id":100,"username":"raw34","firstName":"Randy","lastName":"Chang","email":"raw0034@gmail.com","password":"xxxxxx","phone":"100000","userStatus":0}`

	httpmock.RegisterResponder("GET", url, httpmock.NewStringResponder(200, bodyStringStub))

	client := RestyClient{}

	res, _ := client.SimpleGet(url)

	assert.Equal(t, bodyStringStub, res.String())
}