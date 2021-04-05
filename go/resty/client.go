package resty

import (
	"github.com/go-resty/resty/v2"
)

type ClientInterface interface {
	SetHeader(header, value string)
	//SetHeaders(headers map[string]string)
	//SetQueryParams(params map[string]string)
	//SetQueryString(query string)
	//SetFormData(data map[string]string)
	//SetBasicAuth(username, password string)
	//SetAuthToken(token string)
	//SetCookie(hc *http.Cookie)
	//SetCookies(rs []*http.Cookie)

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

func (c *Client) SetHeader(header, value string) {
	rawClient := c.getRawClient()
	rawClient.SetHeader(header, value)
}

func (c *Client) Get(url string) (ResponseInterface, error) {
	return c.Execute(resty.MethodGet, url)
}

func (c *Client) Head(url string) (ResponseInterface, error) {
	return c.Execute(resty.MethodHead, url)
}

func (c *Client) Post(url string) (ResponseInterface, error) {
	return c.Execute(resty.MethodPost, url)
}

func (c *Client) Put(url string) (ResponseInterface, error) {
	return c.Execute(resty.MethodPut, url)
}

func (c *Client) Delete(url string) (ResponseInterface, error) {
	return c.Execute(resty.MethodDelete, url)
}

func (c *Client) Options(url string) (ResponseInterface, error) {
	return c.Execute(resty.MethodOptions, url)
}

func (c *Client) Patch(url string) (ResponseInterface, error) {
	return c.Execute(resty.MethodPatch, url)
}

func (c *Client) Execute(method, url string) (ResponseInterface, error) {
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
