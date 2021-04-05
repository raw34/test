package http

import (
	"io"
	"log"
	"net/http"
)

type ClientInterface interface {
	Do(req *http.Request) (*http.Response, error)
	DoRequest(method, url string, body io.Reader) (*http.Response, error)
}

type Client struct {
}

func (c *Client) Do(req *http.Request) (*http.Response, error) {
	client := &http.Client{}
	return client.Do(req)
}

func (c *Client) DoRequest(method, url string, body io.Reader) (*http.Response, error)  {
	req, err := http.NewRequest(method, url, body)
	if err != nil {
		log.Println(err)
	}
	// set headers
	// set cookies
	return c.Do(req)
}