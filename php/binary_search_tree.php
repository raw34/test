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
 * Class BinarySearchTree
 * @author Randy Chang
 */
class BinarySearchTree
{
    public function build($arr = [])
    {
        $root = null;

        foreach ($arr as $v) {
            $root = $this->insert($root, $v);
        }

        return $root;
    }

    public function insert($root, $val)
    {
        if ($root === null) {
            return new TreeNode($val);
        }

        if ($root->val < $val) {
            $root->right = $this->insert($root->right, $val);
        }

        if ($root->val > $val) {
            $root->left = $this->insert($root->left, $val);
        }

        return $root;
    }

    public function delete($root, $target)
    {
        if ($root->val === $target) {
            if ($root->left === null) {
                return $root->right;
            }
            if ($root->right === null) {
                return $root->left;
            }
            $min = $this->getMin($root->right);
            $root->val = $min->val;
            $root->right = $this->delete($root->right, $min->val);
        } elseif ($root->val > $target) {
            $root->left = $this->delete($root->left, $target);
        } elseif ($root->val < $target) {
            $root->right = $this->delete($root->right, $target);
        }

        return $root;
    }

    public function getMin($root)
    {
        while ($root->left !== null) {
            $root = $root->left;
        }

        return $root;
    }

    public function getMax($root)
    {
        while ($root->right !== null) {
            $root = $root->right;
        }

        return $root;
    }

    public function has($root, $target)
    {
        if ($root === null) {
            return false;
        }
        
        if ($root->val === $target) {
            return true;
        }
        
        if ($root->val < $target) {
            return $this->has($root->left, $target);
        }

        if ($root->val > $target) {
            return $this->has($root->right, $target);
        }
    }
    
    public function valid($root)
    {
        if ($root === null) {
            return true;
        }

        if ($root->left !== null && $root->val <= $root->left->val) {
            return false;
        }

        if ($root->right !== null && $root->val >= $root->right->val) {
            return false;
        }

        return $this->valid($root->left) && $this->valid($root->right);
    }

    public function display($root)
    {
        if ($root !== null) {
            $this->display($root->left);
            echo $root->val, ' ';
            $this->display($root->right);
        }
    }
}

$arr = range(1, 10);
shuffle($arr);

echo json_encode($arr), "\n";

$bst = new BinarySearchTree();

$root = $bst->build($arr);
$bst->display($root);
echo "\n";

echo 'min = ', $bst->getMin($root)->val, "\n";
echo 'max = ', $bst->getMax($root)->val, "\n";
