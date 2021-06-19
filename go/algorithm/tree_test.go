package algorithm

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

func TestTree1_Case1(t *testing.T) {
	conditions := make([][]string, 0)

	res := tree1(conditions)

	assert.Equal(t, [][]string([][]string{}), res)
}

func TestTree1_Case2(t *testing.T) {
	conditions := [][]string{
		[]string{"A1"},
	}

	res := tree1(conditions)

	assert.Equal(t, conditions, res)
}

func TestTree1_Case3(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1"},
		[]string{"A2"},
	}

	assert.Equal(t, expected, res)
}

func TestTree1_Case4(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2", "A3"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1"},
		[]string{"A2"},
		[]string{"A3"},
	}

	assert.Equal(t, expected, res)
}

func TestTree1_Case5(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2", "A3"},
		[]string{"B1"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1", "B1"},
		[]string{"A2", "B1"},
		[]string{"A3", "B1"},
	}

	assert.Equal(t, expected, res)
}

func TestTree1_Case6(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2", "A3"},
		[]string{"B1", "B2"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1", "B1"},
		[]string{"A1", "B2"},
		[]string{"A2", "B1"},
		[]string{"A2", "B2"},
		[]string{"A3", "B1"},
		[]string{"A3", "B2"},
	}

	assert.Equal(t, expected, res)
}

func TestTree1_Case7(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2", "A3"},
		[]string{"B1", "B2"},
		[]string{"C1"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1", "B1", "C1"},
		[]string{"A1", "B2", "C1"},
		[]string{"A2", "B1", "C1"},
		[]string{"A2", "B2", "C1"},
		[]string{"A3", "B1", "C1"},
		[]string{"A3", "B2", "C1"},
	}

	assert.Equal(t, expected, res)
}

func TestTree1_Case8(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2", "A3"},
		[]string{"B1", "B2"},
		[]string{"C1", "C2"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1", "B1", "C1"},
		[]string{"A1", "B1", "C2"},
		[]string{"A1", "B2", "C1"},
		[]string{"A1", "B2", "C2"},
		[]string{"A2", "B1", "C1"},
		[]string{"A2", "B1", "C2"},
		[]string{"A2", "B2", "C1"},
		[]string{"A2", "B2", "C2"},
		[]string{"A3", "B1", "C1"},
		[]string{"A3", "B1", "C2"},
		[]string{"A3", "B2", "C1"},
		[]string{"A3", "B2", "C2"},
	}

	assert.Equal(t, expected, res)
}

func TestTree1_Case9(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2", "A3"},
		[]string{"B1", "B2"},
		[]string{"C1", "C2", "C3"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1", "B1", "C1"},
		[]string{"A1", "B1", "C2"},
		[]string{"A1", "B1", "C3"},
		[]string{"A1", "B2", "C1"},
		[]string{"A1", "B2", "C2"},
		[]string{"A1", "B2", "C3"},
		[]string{"A2", "B1", "C1"},
		[]string{"A2", "B1", "C2"},
		[]string{"A2", "B1", "C3"},
		[]string{"A2", "B2", "C1"},
		[]string{"A2", "B2", "C2"},
		[]string{"A2", "B2", "C3"},
		[]string{"A3", "B1", "C1"},
		[]string{"A3", "B1", "C2"},
		[]string{"A3", "B1", "C3"},
		[]string{"A3", "B2", "C1"},
		[]string{"A3", "B2", "C2"},
		[]string{"A3", "B2", "C3"},
	}

	assert.Equal(t, expected, res)
}

func TestTree1_Case10(t *testing.T) {
	conditions := [][]string{
		[]string{"A1", "A2", "A3"},
		[]string{"B1", "B2"},
		[]string{"C1", "C2", "C3", "C4"},
	}

	res := tree1(conditions)
	expected := [][]string{
		[]string{"A1", "B1", "C1"},
		[]string{"A1", "B1", "C2"},
		[]string{"A1", "B1", "C3"},
		[]string{"A1", "B1", "C4"},
		[]string{"A1", "B2", "C1"},
		[]string{"A1", "B2", "C2"},
		[]string{"A1", "B2", "C3"},
		[]string{"A1", "B2", "C4"},
		[]string{"A2", "B1", "C1"},
		[]string{"A2", "B1", "C2"},
		[]string{"A2", "B1", "C3"},
		[]string{"A2", "B1", "C4"},
		[]string{"A2", "B2", "C1"},
		[]string{"A2", "B2", "C2"},
		[]string{"A2", "B2", "C3"},
		[]string{"A2", "B2", "C4"},
		[]string{"A3", "B1", "C1"},
		[]string{"A3", "B1", "C2"},
		[]string{"A3", "B1", "C3"},
		[]string{"A3", "B1", "C4"},
		[]string{"A3", "B2", "C1"},
		[]string{"A3", "B2", "C2"},
		[]string{"A3", "B2", "C3"},
		[]string{"A3", "B2", "C4"},
	}

	assert.Equal(t, expected, res)
}
