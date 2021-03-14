package main

import (
	"encoding/csv"
	"log"
	"os"
)

func csv1()  {
	records := [][]string {
		{"first_name", "last_name", "occupation"},
		{"John", "Doe", "gardener"},
		{"Lucy", "Smith", "teacher"},
	}

	file, err := os.Create("1.csv")
	if err != nil {
		log.Fatalln("failed to open file", err)
	}
	defer file.Close()

	writer := csv.NewWriter(file)
	defer writer.Flush()
	for _, record := range records {
		if err := writer.Write(record); err != nil {
			log.Fatalln("error writing record to file", err)
		}
	}
}