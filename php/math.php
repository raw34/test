<?php

function bcceil($number)
{
    if (strpos($number, '.') !== false) {
        if (preg_match("~\.[0]+$~", $number)) return bcround($number, 0);
        if ($number[0] != '-') return bcadd($number, 1, 0);
        return bcsub($number, 0, 0);
    }
    return $number;
}

function bcfloor($number)
{
    if (strpos($number, '.') !== false) {
        if (preg_match("~\.[0]+$~", $number)) return bcround($number, 0);
        if ($number[0] != '-') return bcadd($number, 0, 0);
        return bcsub($number, 1, 0);
    }
    return $number;
}

function bcround($number, $precision = 0)
{
    echo  '0.' . str_repeat('0', $precision) . '5';die();
    if (strpos($number, '.') !== false) {
        if ($number[0] != '-') {
            return bcadd($number, '0.' . str_repeat('0', $precision) . '5', $precision);
        }

        return bcsub($number, '0.' . str_repeat('0', $precision) . '5', $precision);
    }

    return $number;
}

echo bcround(1.2252, 2);
