package algorithm

import "log"

func tree1(conditions [][]string) [][]string {
	lengthCondition := len(conditions)
	if lengthCondition == 0 {
		return conditions
	}

	lengthBranch := 1
	lengthMaxArr := make([]int, 0)
	for _, condition := range conditions {
		l := len(condition)
		lengthBranch *= l
		lengthMaxArr = append(lengthMaxArr, l)
	}

	//log.Println("len branch =", lengthBranch, "len condition =", lengthCondition, "len max arr =", lengthMaxArr)

	result := make([][]string, lengthBranch)
	indexes := make([][]int, lengthBranch)
	for i := 0; i < lengthBranch; i++ {
		result[i] = make([]string, lengthCondition)
		indexes[i] = make([]int, lengthCondition)
	}

	log.Println("indexes start", indexes)

	for i, index := range indexes {
		for j := 0; j < lengthCondition; j++ {
			curr := calculateIndex(i, j, lengthBranch, lengthMaxArr)
			index[j] = curr
			result[i][j] = conditions[j][curr]
		}
	}

	log.Println("indexes end", indexes)

	return result
}

func calculateIndex(i int, j int, length int, lengthMaxArr []int) int {
	div := length
	for k := 0; k <= j; k++ {
		div /= lengthMaxArr[k]
	}

	curr := i / div % lengthMaxArr[j]

	//log.Println("j", j, "i", i, "div", div, "i / div", curr)

	return curr
}

