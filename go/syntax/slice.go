package syntax

func slice1(names []string) []Animal {
	animals := make([]Animal, 0)

	for _, name := range names {
		animals = append(animals, Animal{name: name, age: 2})
	}

	return animals
}