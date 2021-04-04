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
	//request := &HttpClient{}
	//log.Println(request.Get("https://petstore.swagger.io/v2/user/raw34"))
	//api := "https://petstore.swagger.io/v2/user"
	//params := map[string]string{
	//	"id": "100",
	//	"username": "raw34",
	//	"firstName": "Randy",
	//	"lastName": "Chang",
	//	"email": "raw0034@gmail.com",
	//	"password": "xxxxxx",
	//	"phone": "100000",
	//	"userStatus": "0",
	//}
	//log.Println(request.Post(api, params))
	//gorm1()
	//gorm2()
	//gorm3()
	//gorm4()
	//git1()
	//base64Encode()
	//base64Decode()
	client := RestyClient{}
	res, _ := client.SimpleGet("http://top.baidu.com/user/pass?time=552179")
	log.Println(res)
}