<?php

/**
 * Interface LinkedList
 * @author Randy Chang
 */
interface LinkedList
{
    public function init($arr = []);

    public function insertBefore($item, $pos);

    public function insertAfter($item, $pos);

    public function delete($pos);

    public function update($item, $pos);

    public function get($pos);

    public function clear();

    public function size();

    public function display();
}

/**
 * Interface AcyclicLinkedList
 * @author Randy Chang
 */
interface AcyclicLinkedList
{
    public function unshift($item);

    public function shift();

    public function push($item);

    public function pop();
}

/**
 * Class Node
 * @author Randy Chang
 */
class Node
{
    public $data;
    public $prev;
    public $next;

	public function __construct($data)
	{
	    $this->data = $data;
	}
}

/**
 * Class SingleLinkedList
 * @author Randy Chang
 */
class SingleLinkedList implements LinkedList, AcyclicLinkedList
{
    public $head;
    public $length;

    public function __construct()
    {
        $this->head = new Node(null);
        $this->length = 0;
    }

    public function init($arr = [])
    {
        $total = count($arr);

        for ($i = 0; $i < $total; $i++) {
            $this->insertAfter($arr[$i], $i);
        }

        return true;
    }

    public function insertBefore($item, $pos)
    {
        $this->insertAfter($item, $pos - 1);
    }

    public function insertAfter($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos);
        $next = $prev->next;

        $node->next = $next;
        $prev->next = $node;

        $this->length++;
    }

    public function delete($pos)
    {
        $prev = $this->get($pos - 1);
        $next = $prev->next->next;

        $prev->next = $next;

        $this->length--;
    }

    public function update($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos - 1);
        $next = $prev->next->next;

        $node->next = $next;
        $prev->next = $node;
    }

    public function get($pos)
    {
        $curr = $this->head;

        for ($i = 0; $i < $pos; $i++) {
            $curr = $curr->next;
        }

        return $curr;
    }

    public function unshift($item)
    {
        $this->insertBefore($item, 1);
    }

    public function shift()
    {
        $this->delete(1);
    }

    public function push($item)
    {
        $this->insertAfter($item, $this->length);
	}

    public function pop()
    {
        $this->delete($this->length);
	}

    public function reverse()
    {
        $curr = $this->head;
        $prev = null;

        while ($curr) {
            $next = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $next;
        }

        $headNew = new Node(null);
        $headNew->next = $prev;

        $this->head = $headNew;
	}

    public function clear()
    {
        $this->head = null;

        return true;
	}

    public function size()
    {
        return $this->length;
    }

    public function display()
    {
        $curr = $this->head;

        while ($curr->next) {
            echo $curr->next->data, ' ';
            $curr = $curr->next;
        }

        echo "\n";
    }
}


/**
 * Class DoubleLinkedList
 * @author Randy Chang
 */
class DoubleLinkedList extends SingleLinkedList
{
    public $tail;

    public function insertAfter($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos);
        $next = $prev->next;

        $node->prev = $prev;
        $node->next = $next;
        $prev->next = $node;

        if ($next !== null) {
            $next->prev = $node;
        }

        if ($pos === $this->length) {
            $this->tail = $node;
        }

        $this->length++;
    }

    public function delete($pos)
    {
        $prev = $this->get($pos - 1);
        $next = $prev->next->next;

        $prev->next = $next;

        if ($next !== null) {
            $next->prev = $prev;
        }

        if ($pos === $this->length) {
            $this->tail = $prev;
        }

        $this->length--;
    }

    public function update($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos - 1);
        $next = $prev->next;

        $node->prev = $prev;
        $node->next = $next;
        $prev->next = $node;
        $next->prev = $node;

        if ($pos === $this->length) {
            $this->tail = $node;
        }
    }

    public function displayReverse()
    {
        $curr = $this->tail;

        while ($curr->prev) {
            echo $curr->prev->data, ' ';
            $curr = $curr->prev;
        }

        echo "\n";
    }
}


/**
 * Class CircularLinkedList
 * @author Randy Chang
 */
class CircularLinkedList
{
}

$list = new SingleLinkedList();
//$list = new DoubleLinkedList();

$list->init([1, 3, 4, 2]);
echo "init 1, 3, 4, 2\n";
$list->display();

$list->delete(3);
echo "delete pos 3\n";
$list->display();

$list->insertBefore(20, 3);
echo "insert 20 before pos 3\n";
$list->display();

$list->insertAfter(32, 3);
echo "insert 32 after pos 3\n";
$list->display();

$list->unshift(21);
echo "insert 21 to head\n";
$list->display();

$list->push(22);
echo "insert 22 to tail\n";
$list->display();

$list->shift();
echo "delete head\n";
$list->display();

$list->pop();
echo "delete tail\n";
$list->display();

$list->update(30, 3);
echo "update pos 3 to 30\n";
$list->display();

$list->reverse();
echo "reverse\n";
$list->display();

