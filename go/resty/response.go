package resty

import "github.com/go-resty/resty/v2"

type ResponseInterface interface {
	StatusCode() int
	String() string
}

type Response struct {
	rawResponse *resty.Response
}

func (r *Response) getRawResponse() *resty.Response {
	if r.rawResponse == nil {
		r.rawResponse = &resty.Response{}
	}
	
	return r.rawResponse
}

func (r *Response) StatusCode() int {
	rawResponse := r.getRawResponse()
	return rawResponse.StatusCode()
}

func (r *Response) String() string {
	rawResponse := r.getRawResponse()
	return rawResponse.String()
}