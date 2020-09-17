<?php
//SplQueue
$queue = new SplQueue();

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $len = count($prices);

        if ($len < 2) {
            return 0;
        }

        $cash = [0];
        $hold = [-$prices[0]];

        for ($i = 1; $i < $len - 1; $i++) {
            echo "i = $i, cash = ", json_encode($cash), "\n";
            echo "i = $i, hold = ", json_encode($hold), "\n";
            $cash[$i] = max($cash[$i - 1], $hold[$i - 1] + $prices[$i]);
            $hold[$i] = max($hold[$i - 1], $cash[$i - 1] - $prices[$i]);
        }

        return $cash[$len - 1];
    }
}
