<?php
/**
 * Class PriorityQueue
 * @author Randy Chang
 */
class PriorityQueue
{
    private $queue = [null];
    private $count = 0;

    public function parent($root)
    {
        return floor($root / 2);
    }

    public function left($root)
    {
        return $root * 2;
    }

    public function right($root)
    {
        return $root * 2 + 1;
    }

    public function swap($i, $j)
    {
        $tmp = $this->queue[$i];
        $this->queue[$i] = $this->queue[$j];
        $this->queue[$j] = $tmp;
    }

    public function less($i, $j)
    {
        return $this->queue[$i] < $this->queue[$j];
    }

    public function swim($k)
    {
        while ($k > 1 && $this->less($this->parent($k), $k)) {
            $this->swap($this->parent($k), $k);
            $k = $this->parent($k);
        }
    }

    public function sink($k)
    {
        while ($this->left($k) <= $this->count) {
            $older = $this->left($k);
            $right = $this->right($k);

            if ($right <= $this->count && $this->less($older, $right)) {
                $older = $right;
            }

            if ($this->less($older, $k)) {
                break;
            }

            $this->swap($k, $older);
            $k = $older;
        }
    }

    public function insert($e)
    {
        $this->count++;
        $this->queue[$this->count] = $e;
        $this->swim($this->count);
    }

    public function delMax()
    {
        $max = $this->queue[1];
        $this->swap(1, $this->count);
        unset($this->queue[$this->count]);
        $this->count--;
        $this->sink(1);

        return $max;
    }

    public function getMax()
    {
        return $this->queue[1];
    }

    public function getQueue()
    {
        return $this->queue;
    }
}

$arr = range(1, 10);
shuffle($arr);

echo 'i arr = ', json_encode($arr), "\n";

$queue = new PriorityQueue();

foreach ($arr as $k => $v) {
    $queue->insert($v);
}

echo 'o arr = ', json_encode($queue->getQueue()), "\n";

echo 'max1 = ', $queue->getMax(), "\n";
echo 'max1 = ', $queue->delMax(), "\n";
echo 'max2 = ', $queue->delMax(), "\n";
echo 'max3 = ', $queue->delMax(), "\n";
//echo 'max2 = ', $queue2->top(), "\n";

