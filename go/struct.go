package main

type animal struct {
	name string
	age int
}

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
