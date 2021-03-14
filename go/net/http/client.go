package http

import "net/http"

type ClientInterface interface {
	selfDo(req *http.Request) (*http.Response, error)
}

type Client struct {
	http.Client
	ClientInterface
}

func (c *Client) selfDo(req *http.Request) (*http.Response, error) {
	return c.Do(req)
}