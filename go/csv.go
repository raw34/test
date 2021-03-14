package main

import (
	"encoding/csv"
	"log"
	"os"
)

var records = [][]string {
	{"first_name", "last_name", "occupation"},
	{"John", "Doe", "gardener"},
	{"Lucy", "Smith", "teacher"},
}

func csv1()  {
	f, err := os.Create("users.csv")
	if err != nil {
		log.Fatalln("failed to open file", err)
	}
	defer f.Close()

	w := csv.NewWriter(f)
	defer w.Flush()
	for _, record := range records {
		if err := w.Write(record); err != nil {
			log.Fatalln("error writing record to file", err)
		}
	}
}

func csv2()  {
	f, err := os.Create("users.csv")
	if err != nil {
		log.Fatalln("failed to open file", err)
	}
	defer f.Close()

	w := csv.NewWriter(f)
	err = w.WriteAll(records) // calls Flush internally

	if err != nil {
		log.Fatal(err)
	}
}