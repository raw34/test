package main

import "log"

func main() {
	//hello()
	//ping()
	//slice1()
	//time1()
	//time2()
	//time3()
	//time4()
	//time5()
	//csv1()
	//csv2()
	//json1()
	//json2()
	//cat := Cat{}
	//cat.Eat()
	//cat.Bark()
	//dog := Dog{}
	//dog.Eat()
	//dog.Bark()
	httpClient := HttpClient{}
	log.Println(httpClient.Get("https://petstore.swagger.io/v2/user/raw34"))
}