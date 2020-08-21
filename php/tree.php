<?php

/**
 * Class TreeNode
 * @author Randy Chang
 */
class TreeNode
{
    public $val;
    public $left;
    public $right;

	public function __construct($val)
	{
	    $this->val = $val;
	}
}

/**
 * Class BinaryTree
 * @author Randy Chang
 */
class BinaryTree
{
    private $stackPre = [];
    private $stackIn = [];
    private $stackPost = [];

    public function insert($arr, $index)
    {
        if ($index === count($arr)) {
            return null;
        }

        if (!isset($arr[$index])) {
            return null;
        }

        $node = new TreeNode($arr[$index]);
        $node->left = $this->insert($arr, $index * 2 + 1);
        $node->right = $this->insert($arr, $index * 2 + 2);

        return $node;
    }

    public function build($arr = [])
    {
        return $this->insert($arr, 0);
    }

    public function buildFromPreIn($pre= [], $in = [])
    {
    }

    public function buildFromPostIn($post = [], $in = [])
    {
    }

    public function buildFromPrePost($pre = [], $post = [])
    {
    }

    public function preOrder($root)
    {
        if ($root !== null) {
            $this->stackPre[] = $root->val;
            $this->preOrder($root->left);
            $this->preOrder($root->right);
        }

        return $this->stackPre;
    }

    public function inOrder($root)
    {
        if ($root !== null) {
            $this->inOrder($root->left);
            $this->stackIn[] = $root->val;
            $this->inOrder($root->right);
        }

        return $this->stackIn;
    }

    public function postOrder($root)
    {
        if ($root !== null) {
            $this->postOrder($root->left);
            $this->postOrder($root->right);
            $this->stackPost[] = $root->val;
        }

        return $this->stackPost;
    }

    public function levelOrderDfs($root)
    {
        $res = [];

        $this->dfs4LevelOrder($root, 0, $res);

        return $res;
    }

    public function dfs4LevelOrder($root, $level, &$res)
    {
        $res[$level][] = $root->val;

        if ($root->left !== null) {
            $this->dfs4LevelOrder($root->left, $level + 1, $res);
        }

        if ($root->right !== null) {
            $this->dfs4LevelOrder($root->right, $level + 1, $res);
        }
    }

    public function levelOrderBfs($root)
    {
        $queue = $res = [];

        if ($root === null) {
            return null;
        }

        array_push($queue, $root);

        $level = 0;
        while ($count = count($queue)) {
            for ($i = 0; $i < $count; $i++) {
                $node = array_shift($queue);
                $res[$level][] = $node->val;

                if ($node->left !== null) {
                    array_push($queue, $node->left);
                }
                
                if ($node->right !== null) {
                    array_push($queue, $node->right);
                }
            }
            $level++;
        }

        return $res;
    }

    public function getNodeNum()
    {
    }
    
    public function getLeafNum()
    {
    }
    
    public function getDepth()
    {
    }
}

$arr = range(1, 10);
//$arr = range('a', 'z');
$tree = new BinaryTree();
$root = $tree->build($arr);

echo "前序遍历 = ", json_encode($tree->preOrder($root)), "\n";
echo "中序遍历 = ", json_encode($tree->inOrder($root)), "\n";
echo "后序遍历 = ", json_encode($tree->postOrder($root)), "\n";
echo "层序遍历dfs = ", json_encode($tree->levelOrderDfs($root)), "\n";
echo "层序遍历bfs = ", json_encode($tree->levelOrderBfs($root)), "\n";
