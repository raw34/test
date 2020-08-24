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
        $root = new TreeNode($arr[0]);
        $queue = [$root];

        $i = 1;
        while (!empty($queue)) {
            $node = array_shift($queue);

            if ($arr[$i] !== null) {
                $node->left = new TreeNode($arr[$i]);
                $queue[] = $node->left;
            }
            $i++;

            if ($arr[$i] !== null) {
                $node->right = new TreeNode(($arr[$i]));
                $queue[] = $node->right;
            }
            $i++;
        }

        return $root;
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

    public function getNodeNum($root)
    {
        if ($root === null) {
            return 0;
        }

        return $this->getNodeNum($root->left) + $this->getNodeNum($root->right) + 1;
    }

    public function getLeafNum($root)
    {
        if ($root === null) {
            return 0;
        }

        if ($root->left === null && $root->right === null) {
            return 1;
        }

        return $this->getLeafNum($root->left) + $this->getLeafNum($root->right);
    }

    public function getDepth($root)
    {
        if ($root === null) {
            return 0;
        }

        $left = $this->getDepth($root->left);
        $right = $this->getDepth($root->right);

        return max($left, $right) + 1;
    }

    public function preOrder1($root)
    {
        if ($root !== null) {
            $this->stackPre[] = $root->val;
            $this->preOrder1($root->left);
            $this->preOrder1($root->right);
        }

        return $this->stackPre;
    }

    public function preOrder2($root)
    {
        $res = $stack = [];

        while ($root !== null || !empty($stack)) {
            while ($root !== null) {
                $res[] = $root->val;
                $stack[] = $root;
                $root = $root->left;
            }

            if (!empty($stack)) {
                $root = array_pop($stack);
                $root = $root->right;
            }
        }

        return $res;
    }

    public function inOrder1($root)
    {
        if ($root !== null) {
            $this->inOrder1($root->left);
            $this->stackIn[] = $root->val;
            $this->inOrder1($root->right);
        }

        return $this->stackIn;
    }

    public function inOrder2($root)
    {
        $res = $stack = [];

        while ($root !== null || !empty($stack)) {
            while ($root !== null) {
                $stack[] = $root;
                $root = $root->left;
            }
            
            if (!empty($stack)) {
                $root = array_pop($stack);
                $res[] = $root->val;
                $root = $root->right;
            }
        }

        return $res;
    }

    public function postOrder1($root)
    {
        if ($root !== null) {
            $this->postOrder1($root->left);
            $this->postOrder1($root->right);
            $this->stackPost[] = $root->val;
        }

        return $this->stackPost;
    }

    public function postOrder2($root)
    {
        $res = $stack = [];
        $prev = $curr = null;
        $stack[] = $root;

        while ($length = count($stack)) {
            $curr = $stack[$length - 1];
            
            if (
                ($curr->left === null && $curr->right === null)
                || ($prev !== null && ($prev === $curr->left || $prev === $curr->right))
                )
            {
                $res[] = $curr->val;
                $prev = array_pop($stack);
            } else {
                if ($curr->right !== null) {
                    $stack[] = $curr->right;
                }

                if ($curr->left !== null) {
                    $stack[] = $curr->left;
                }
            }
        }

        return $res;
    }

    public function levelOrder1($root)
    {
        $res = [];

        $this->levelOrder1dfs($root, 0, $res);

        return $res;
    }

    public function levelOrder1dfs($root, $level, &$res)
    {
        $res[$level][] = $root->val;

        if ($root->left !== null) {
            $this->levelOrder1dfs($root->left, $level + 1, $res);
        }

        if ($root->right !== null) {
            $this->levelOrder1dfs($root->right, $level + 1, $res);
        }
    }

    public function levelOrder2($root)
    {
        return $this->levelOrder2bfs($root);
    }

    public function levelOrder2bfs($root)
    {
        $queue = $res = [];

        if ($root === null) {
            return null;
        }

        $queue[] = $root;

        $level = 0;
        while ($count = count($queue)) {
            for ($i = 0; $i < $count; $i++) {
                $node = array_shift($queue);
                $res[$level][] = $node->val;

                if ($node->left !== null) {
                    $queue[] = $node->left;
                }

                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
            }
            $level++;
        }

        return $res;
    }
}

$arr = range(1, 10);
//$arr = range(10, 1);
//$arr = range('a', 'z');
$tree = new BinaryTree();
$root = $tree->build($arr);

echo '节点总数 = ', $tree->getNodeNum($root), "\n";
echo '叶子总数 = ', $tree->getLeafNum($root), "\n";
echo '最大深度 = ', $tree->getDepth($root), "\n";
echo '前序遍历1 = ', json_encode($tree->preOrder1($root)), "\n";
echo '前序遍历2 = ', json_encode($tree->preOrder2($root)), "\n";
echo '中序遍历1 = ', json_encode($tree->inOrder1($root)), "\n";
echo '中序遍历2 = ', json_encode($tree->inOrder2($root)), "\n";
echo '后序遍历1 = ', json_encode($tree->postOrder1($root)), "\n";
echo '后序遍历2 = ', json_encode($tree->postOrder2($root)), "\n";
echo '层序遍历dfs = ', json_encode($tree->levelOrder1($root)), "\n";
echo '层序遍历bfs = ', json_encode($tree->levelOrder2($root)), "\n";

