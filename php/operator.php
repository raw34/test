<?php

/**
 * Class operator
 * @author Randy Chang
 */
class operator
{
    private $filter;

    public function questionMark1(): array
    {
        return $this->filter ? : [];
	}

    public function questionMark2(): array
    {
        return $this->filter ?? [];
    }
}

$obj = new operator();

var_dump($obj->questionMark1() === $obj->questionMark2() && is_array($obj->questionMark1()) && !$obj->questionMark1());

