package main

import (
	"fmt"
	"time"
)

func time1()  {
	fmt.Println(time.Now().Format("2006-01-02 15:04:05"))
}

func time2()  {
	fmt.Println(time.Now().Add(- time.Hour * 1).Format("2006-01-02 15:04:05"))
	fmt.Println(time.Now().Add(- time.Minute * 1).Format("2006-01-02 15:04:05"))
	fmt.Println(time.Now().Add(- time.Second * 1).Format("2006-01-02 15:04:05"))
}

func time3()  {
	now := time.Now()
	fmt.Println(now.AddDate(0, 0, -now.Day() + 1).Format("2006-01-02"))
	fmt.Println(now.AddDate(0, 1, -now.Day()).Format("2006-01-02"))
}
