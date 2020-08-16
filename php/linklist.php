<?php

/**
 * Interface linklist
 * @author Randy Chang
 */
interface LinkList
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
 * Interface AcyclicLinkList
 * @author Randy Chang
 */
interface AcyclicLinkList
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
 * Class SingleLinkList
 * @author Randy Chang
 */
class SingleLinkList implements LinkList, AcyclicLinkList
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
        $cur = $this->head;

        for ($i = 0; $i < $pos; $i++) {
            $cur = $cur->next;
        }

        return $cur;
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
        $cur = $this->head;

        while ($cur->next) {
            echo $cur->next->data, ' ';
            $cur = $cur->next;
        }

        echo "\n";
    }
}

/*
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
*/



/**
 * Class DoubleLinkList
 * @author Randy Chang
 */
class DoubleLinkList extends SingleLinkList
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
        $cur = $this->tail;

        echo $cur->data, ' ';

        while ($cur->prev) {
            echo $cur->prev->data, ' ';
            $cur = $cur->prev;
        }

        echo "\n";
    }
}


$dList = new DoubleLinkList();

$dList->init([1, 3, 4, 2]);
echo "init 1, 3, 4, 2\n";
$dList->display();

$dList->delete(3);
echo "delete pos 3\n";
$dList->display();

$dList->insertBefore(20, 3);
echo "insert 20 before pos 3\n";
$dList->display();

$dList->insertAfter(32, 3);
echo "insert 32 after pos 3\n";
$dList->display();

$dList->unshift(21);
echo "insert 21 to head\n";
$dList->display();

$dList->push(22);
echo "insert 22 to tail\n";
$dList->display();

$dList->shift();
echo "delete head\n";
$dList->display();

$dList->pop();
echo "delete tail\n";
$dList->display();

$dList->update(30, 3);
echo "update pos 3 to 30\n";
$dList->display();

echo "display reverse\n";
$dList->displayReverse();

/**
 * Class CircularLinkedList
 * @author Randy Chang
 */
class CircularLinkedList
{
}
