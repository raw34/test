package main

func slice1(names []string) []animal {
	animals := make([]animal, 0)

	for _, name := range names {
		animals = append(animals, animal{name: name, age: 2})
	}

	return animals
}