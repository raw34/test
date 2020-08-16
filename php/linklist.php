<?php

/**
 * Class Node
 * @author Randy Chang
 */
class Node
{
    public $data;
    public $perv;
    public $next;

	public function __construct($data)
	{
	    $this->data = $data;
	}
}

/**
 * Class SingleLinkList
 * @author Randy Chang
 */
class SingleLinkList
{
    public $head;
    public $length;

    public function __construct()
    {
        $this->head = new Node(null);
        $this->length = 0;
    }

    public function init($arr)
    {
        $total = count($arr);

        for ($i = 0; $i < $total; $i++) {
            $this->insertAfter($arr[$i], $i);
        }

        return true;
    }

    public function get($pos)
    {
        $cur = $this->head;

        for ($i = 0; $i < $pos; $i++) {
            $cur = $cur->next;
        }

        return $cur;
    }

    public function insertBefore($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos - 1);

        $node->next = $prev->next;
        $prev->next = $node;
        $this->length++;
    }

    public function insertAfter($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos);

        $node->next = $prev->next;
        $prev->next = $node;
        $this->length++;
    }

    public function delete($pos)
    {
        $prev = $this->get($pos - 1);

        $prev->next = $prev->next->next;
        $this->length--;
    }

    public function update($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos - 1);
        $node->next = $prev->next->next;
        $prev->next = $node;
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
	}

    public function size()
    {
        return $this->length;
	}

    public function clear()
    {
        $this->head = null;

        return true;
	}

    public function display()
    {
        $cur = $this->head;

        while ($cur->next) {
            echo $cur->next->data, ' ';
            $cur = $cur->next;
        }

        echo "\n";
    }
}

$sList = new SingleLinkList();

$sList->init([1, 3, 4, 2]);
echo "init 1, 3, 4, 2\n";
$sList->display();

$sList->delete(3);
echo "delete pos 3\n";
$sList->display();

$sList->insertBefore(20, 3);
echo "insert 20 before pos 3\n";
$sList->display();

$sList->insertAfter(32, 3);
echo "insert 32 after pos 3\n";
$sList->display();

$sList->unshift(21);
echo "insert 21 to head\n";
$sList->display();

$sList->push(22);
echo "insert 22 to tail\n";
$sList->display();

$sList->shift();
echo "delete head\n";
$sList->display();

$sList->pop();
echo "delete tail\n";
$sList->display();

$sList->update(30, 3);
echo "update pos 3 to 30\n";
$sList->display();


/**
 * Class DoubleLinkList
 * @author Randy Chang
 */
class DoubleLinkList
{
    public $head;
    public $length;

    public function __construct()
	{
        $this->head= new Node(null);
        $this->length = 0;
	}
}

/**
 * Class CircularLinkedList
 * @author Randy Chang
 */
class CircularLinkedList
{
    public $head;
    public $length;

    public function __construct()
    {
        $this->head= new Node(null);
        $this->length = 0;
    }
}
