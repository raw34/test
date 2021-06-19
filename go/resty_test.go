package main

import (
	"github.com/golang/mock/gomock"
	"github.com/stretchr/testify/assert"
	"raw34/test/go/resty"
	"testing"
)

func Test_restyGet(t *testing.T) {
	url := "https://petstore.swagger.io/v2/user/raw34"
	bodyStringStub := `{"id":100,"username":"raw34","firstName":"Randy","lastName":"Chang","email":"raw0034@gmail.com","password":"xxxxxx","phone":"100000","userStatus":0}`

	ctrl := gomock.NewController(t)
	ctrl.Finish()

	respStub := resty.NewMockResponseInterface(ctrl)
	respStub.EXPECT().String().Return(bodyStringStub)

	clientMock := resty.NewMockClientInterface(ctrl)
	clientMock.EXPECT().SetHeader("Accept", "application/json").Return()
	clientMock.EXPECT().Get(url).Return(respStub, nil)

	restyClient := Resty{}
	restyClient.setClient(clientMock)

	res, _ := restyClient.Get(url)

	assert.Equal(t, bodyStringStub, res.String())
}