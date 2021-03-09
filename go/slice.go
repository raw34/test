package main

func slice1() {
	animals := make([]animal, 5)

	animals = append(animals, animal{name: "灯泡", age: 2})
	animals = append(animals, animal{name: "闹闹", age: 2})

	println(animals)
}