package resty

import (
	"github.com/go-resty/resty/v2"
	"net/http"
)

type ClientInterface interface {
	SetHeader(header, value string) ClientInterface
	SetHeaders(headers map[string]string) ClientInterface
	SetQueryParams(params map[string]string) ClientInterface
	SetQueryString(query string) ClientInterface
	SetFormData(data map[string]string) ClientInterface
	SetBasicAuth(username, password string) ClientInterface
	SetAuthToken(token string) ClientInterface
	SetCookie(hc *http.Cookie) ClientInterface
	SetCookies(rs []*http.Cookie) ClientInterface

	Get(url string) (ResponseInterface, error)
	Head(url string) (ResponseInterface, error)
	Post(url string) (ResponseInterface, error)
	Put(url string) (ResponseInterface, error)
	Delete(url string) (ResponseInterface, error)
	Options(url string) (ResponseInterface, error)
	Patch(url string) (ResponseInterface, error)
	Execute(method, url string) (ResponseInterface, error)
}

type Client struct {
	rawClient *resty.Client
}

func (c *Client) getRawClient() *resty.Client {
	if c.rawClient == nil {
		c.rawClient = resty.New()
	}
	
	return c.rawClient
}

func (c *Client) SetHeader(header, value string) *Client {
	c.rawClient.SetHeader(header, value)
	return c
}

func (c *Client) Get(url string) (*Response, error) {
	return c.Execute(resty.MethodGet, url)
}

func (c *Client) Execute(method, url string) (*Response, error) {
	rawClient := c.getRawClient()
	req := rawClient.NewRequest()
	resp, err := req.Execute(method, url)

	if err != nil {
		return nil, err
	}

	respNew := &Response{}
	respNew.rawResponse = resp

	return respNew, err
}
