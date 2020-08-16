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

    public function get($pos)
    {
        $cur = $this->head;

        for ($i = 0; $i < $pos; $i++) {
            $cur = $cur->next;
        }

        return $cur;
    }

    public function insert($item, $pos)
    {
        $node = new Node($item);

        $prev = $this->get($pos - 1);

        $node->next = $prev->next;
        $prev->next = $node;
        $this->length++;
    }

    public function insertHead($item)
    {
        $this->insert($item, 1);
    }

    public function insertTail($item)
    {
        $this->insert($item, $this->length + 1);
	}

    public function delete($pos)
    {
        $prev = $this->get($pos - 1);

        $prev->next = $prev->next->next;
        $this->length--;
    }

    public function deleteHead()
    {
        $this->delete(1);
	}

    public function deleteTail()
    {
        $this->delete($this->length);
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
$sList->insertTail(1);
$sList->insertTail(3);
$sList->insertTail(4);
$sList->insertTail(2);
echo "insert 1, 3, 4, 2\n";
$sList->display();

$sList->delete(3);
echo "delete pos 3\n";
$sList->display();

$sList->insert(20, 3);
echo "insert 20 to pos 3\n";
$sList->display();

$sList->insertHead(21);
echo "insert 21 to head\n";
$sList->display();

$sList->insertTail(22);
echo "insert 22 to tail\n";
$sList->display();

$sList->deleteHead();
echo "delete head\n";
$sList->display();

$sList->deleteTail();
echo "delete tail\n";
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
	public function __construct($options)
	{
	}
}
