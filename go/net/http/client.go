package http

import (
	"net/http"
)

type ClientInterface interface {
	Do(req *http.Request) (*http.Response, error)
}

type Client struct {
	ClientInterface
}

func (c *Client) Do(req *http.Request) (*http.Response, error) {
	client := http.Client{}
	return client.Do(req)
}