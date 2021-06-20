package util

import (
	"fmt"
	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

type Product struct {
	gorm.Model
	Code  string
	Price uint
}

func getDbConnection() *gorm.DB {
	db, err := gorm.Open(sqlite.Open("test.db"), &gorm.Config{})
	if err != nil {
		panic("failed to connect database")
	}

	// Migrate the schema
	db.AutoMigrate(&Product{})

	return db
}

func gorm1() {
	db := getDbConnection()
	// Create
	db.Create(&Product{Code: "D42", Price: 100})
	db.Create(&Product{Code: "D43", Price: 101})
}

func gorm2()  {
	db := getDbConnection()

	// Read
	var product Product
	db.First(&product, 1) // find product with integer primary key
	db.First(&product, "code = ?", "D42") // find product with code D42

	fmt.Println(product)
}

func gorm3()  {
	db := getDbConnection()

	var product Product
	db.First(&product, 1) // find product with integer primary key
	// Update - update product's price to 200
	db.Model(&product).Update("Price", 200)
	// Update - update multiple fields
	db.Model(&product).Updates(Product{Price: 200, Code: "F42"}) // non-zero fields
	db.Model(&product).Updates(map[string]interface{}{"Price": 200, "Code": "F42"})

	// Delete - delete product
	db.Delete(&product, 1)
}

func gorm4()  {
	db := getDbConnection()

	var product Product

	// Delete - delete product
	db.Delete(&product, 1)
}