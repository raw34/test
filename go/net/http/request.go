package http

import (
	"io"
	"net/http"
)

type RequestInterface interface {
	NewRequest(method, url string, body io.Reader) (*http.Request, error)
}

type Request struct {
	RequestInterface
}

func (r *Request) NewRequest(method, url string, body io.Reader) (*http.Request, error) {
	return http.NewRequest(method, url, body)
}
