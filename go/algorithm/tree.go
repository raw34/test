package algorithm

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
	for i := 0; i < lengthBranch; i++ {
		result[i] = make([]string, lengthCondition)
	}

	for i, _ := range result {
		for j := 0; j < lengthCondition; j++ {
			curr := calculateIndex(i, j, lengthBranch, lengthMaxArr)
			result[i][j] = conditions[j][curr]
		}
	}

	return result
}

func calculateIndex(i int, j int, length int, lengthMaxArr []int) int {
	div := length
	//log.Println("i", i, "j", j, "length", length, "div", div, "lengthMaxArr", lengthMaxArr)
	for k := 0; k <= j; k++ {
		div /= lengthMaxArr[k]
	}

	curr := i / div % lengthMaxArr[j]

	//log.Println("j", j, "i", i, "div", div, "i / div", curr)

	return curr
}

