package resty

import "github.com/go-resty/resty/v2"

type ResponseInterface interface {
	StatusCode() int
	String() string
}

type Response struct {
	rawResponse *resty.Response
}

func (r *Response) StatusCode() int {
	return r.rawResponse.StatusCode()
}

func (r *Response) String() string {
	return r.rawResponse.String()
}