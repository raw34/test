package main

import (
	"log"
	"raw34/test/go/resty"
)

type Resty struct {
	client resty.ClientInterface
}

func (r *Resty) getClient() resty.ClientInterface {
	if r.client == nil {
		r.client = &resty.Client{}
	}

	return r.client
}

func (r *Resty) setClient(client resty.ClientInterface)  {
	r.client = client
}

func (r *Resty) Get(url string) (resty.ResponseInterface, error)  {
	client := r.getClient()

	client.SetHeader("Accept", "application/json")
	resp, err := client.Get(url)

	if err != nil {
		log.Println(err)
		return nil, err
	}

	return resp, nil
}