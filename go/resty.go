package main

import (
	"github.com/go-resty/resty/v2"
	"log"
	"net/http"
)


type RestyRequestInterface interface {
	SetHeader(header, value string) *resty.Request
	SetHeaders(headers map[string]string) *resty.Request
	SetQueryParams(params map[string]string) *resty.Request
	SetQueryString(query string) *resty.Request
	SetFormData(data map[string]string) *resty.Request
	SetBasicAuth(username, password string) *resty.Request
	SetAuthToken(token string) *resty.Request
	SetCookie(hc *http.Cookie) *resty.Request
	SetCookies(rs []*http.Cookie) *resty.Request
	Get(url string) (*resty.Response, error)
	Head(url string) (*resty.Response, error)
	Post(url string) (*resty.Response, error)
	Put(url string) (*resty.Response, error)
	Delete(url string) (*resty.Response, error)
	Options(url string) (*resty.Response, error)
	Patch(url string) (*resty.Response, error)
	Execute(method, url string) (*resty.Response, error)
}

type RestyResponseInterface interface {
	StatusCode() int
	String() string
}

type RestyClient struct {
	request RestyRequestInterface
}

func (r *RestyClient) getHttpRequest() RestyRequestInterface {
	if r.request == nil {
		r.request = resty.New().NewRequest()
	}

	return r.request
}

func (r *RestyClient) setHttpRequest(request RestyRequestInterface) {
	r.request = request
}

func (r *RestyClient) SimpleGet(api string) (RestyResponseInterface, error)  {
	client := r.getHttpRequest()

	resp, err := client.
		SetHeader("Accept", "application/json").
		Get(api)

	if err != nil {
		log.Println(err)
		panic(err.Error())
	}

	return resp, err
}