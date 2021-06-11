package main

import (
	"fmt"
	"github.com/go-playground/validator/v10"
)

// User1 contains user information
type User1 struct {
	FirstName      string     `validate:"required"`
	LastName       string     `validate:"required"`
	Age            uint8      `validate:"gte=0,lte=130"`
	Email          string     `validate:"required,email"`
	FavouriteColor string     `validate:"iscolor"`                // alias for 'hexcolor|rgb|rgba|hsl|hsla'
	Addresses      []*Address `validate:"required,dive,required"` // a person can have a home and cottage...
}

// Address houses a users address information
type Address struct {
	Street string `validate:"required"`
	City   string `validate:"required"`
	Planet string `validate:"required"`
	Phone  string `validate:"required"`
}

func dumpValidateErrors(errs interface{})  {
	for _, err := range errs.(validator.ValidationErrors) {
		fmt.Println(fmt.Sprintf("Namespace is %s", err.Namespace()))
		fmt.Println(fmt.Sprintf("Field is %s", err.Field()))
		fmt.Println(fmt.Sprintf("StructNamespace is %s", err.StructNamespace()))
		fmt.Println(fmt.Sprintf("StructField is %s", err.StructField()))
		fmt.Println(fmt.Sprintf("Tag is %s", err.Tag()))
		fmt.Println(fmt.Sprintf("ActualTag is %s", err.ActualTag()))
		fmt.Println(fmt.Sprintf("Kind is %s", err.Kind()))
		fmt.Println(fmt.Sprintf("Type is %s", err.Type()))
		fmt.Println(fmt.Sprintf("Value is %s", err.Value()))
		fmt.Println(fmt.Sprintf("Param is %s", err.Param()))
		fmt.Println()
	}
}

func validate1() {
	validate := validator.New()

	myEmail := "joeybloggs.gmail.com"

	errs := validate.Var(myEmail, "required,email")

	if errs != nil {
		fmt.Println(errs) // output: Key: "" Error:Field validation for "" failed on the "email" tag
		return
	}

	// email ok, move on
}

func validate2() {
	validate := validator.New()

	address := &Address{
		Street: "Eavesdown Docks",
		Planet: "Persphone",
		Phone:  "none",
	}

	user := &User1{
		FirstName:      "Badger",
		LastName:       "Smith",
		Age:            135,
		Email:          "Badger.Smith@gmail.com",
		FavouriteColor: "#000-",
		Addresses:      []*Address{address},
	}

	// returns nil or ValidationErrors ( []FieldError )
	errs := validate.Struct(user)
	if errs != nil {

		// this check is only needed when your code could produce
		// an invalid value for validation such as interface with nil
		// value most including myself do not usually have code like this.
		if _, ok := errs.(*validator.InvalidValidationError); ok {
			fmt.Println(errs)
			return
		}

		dumpValidateErrors(errs)

		// from here you can create your own error messages in whatever language you wish
		return
	}

	// save user to database
}

func validate3()  {
	validate := validator.New()

	data := map[string]interface{}{
		"name":  "Arshiya Kiani",
		"email": "zytel3301@gmail.com",
		"details": map[string]interface{}{
			"family_members": map[string]interface{}{
				"father_name": "Micheal",
				"mother_name": "Hannah",
			},
			"salary": "1000",
		},
	}

	// Rules must be set as the structure as the data itself. If you want to dive into the
	// map, just declare its rules as a map
	rules := map[string]interface{}{
		"name":  "min=4,max=32",
		"age": "required,number",
		"email": "required,email",
		"details": map[string]interface{}{
			"family_members": map[string]interface{}{
				"father_name": "required,min=4,max=32",
				"mother_name": "required,min=4,max=32",
			},
			"salary": "number",
		},
	}

	errs := validate.ValidateMap(data, rules)
	if len(errs) > 0 {
		for field, err := range errs {
			fmt.Println("field is " + field)
			dumpValidateErrors(err)
		}
	}
}