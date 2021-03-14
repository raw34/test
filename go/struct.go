package main

import "log"

type User struct {
	Id int64 `json:"id"`
	Username string `json:"username"`
	FirstName string `json:"firstName"`
	LastName string `json:"lastName"`
	Email string `json:"email"`
	Password string `json:"password"`
	Phone string `json:"phone"`
	UserStatus int `json:"userStatus"`
}

type AnimalInterface interface {
	Eat()
	Bark()
}

type Animal struct {
	name string
	age int
	AnimalInterface
}

func (a *Animal) Eat() {
	log.Printf("animal eat")
}

type Cat struct {
	Animal
}

func (c *Cat) Bark()  {
	log.Printf("mio mio mio")
}

type Dog struct {
	Animal
}

func (d *Dog) Eat()  {
	log.Printf("dog eat")
}

func (d *Dog) Bark()  {
	log.Printf("wong wong wong")
}

