package main

import "testing"
import "github.com/stretchr/testify/assert"


func Test_slice1(t *testing.T) {
	data := []string{"闹闹", "灯泡"}

	res := slice1(data)

	assert.Equal(t, "闹闹", res[0].name)
	assert.Equal(t, 2, res[0].age)
	assert.Equal(t, "灯泡", res[1].name)
	assert.Equal(t, 2, res[1].age)
}