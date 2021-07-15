package syntax

func division(a int, b int) interface{} {
	if b == 0 {
		return nil
	}
	return a / b
}