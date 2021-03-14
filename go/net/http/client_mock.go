package http

import "net/http"

type ClientMock struct {
	ClientInterface
}

func (c *ClientMock) Do(req *http.Request) (*http.Response, error) {
	return &http.Response{}, nil
}
