<?php

class Node {
    public $data;
    public $left;
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

}


class BSTree {
    private $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function isEmpty()
    {
        return $this->root == null;
    }

    public function insert($data)
    {
        $node = new Node($data);
        if ($this->isEmpty()) {
            $this->root = $node;
            return true;
        } else {
            return $this->insertNode($node, $this->root);
        }
    }

    private function insertNode($newNode, &$node)
    {
        if ($node == null) {
            $node = $newNode;
        } else {
            if ($node->data > $newNode->data) {
                $this->insertNode($newNode, $node->left);
            } else if ($node->data < $newNode->data) {
                $this->insertNode($newNode, $node->right);
            } else {
                echo "tree already exist";
                return false;
            }
        }
        return true;
    }

    public function traverseDFS($node = null, $depth = 0)
    {
        if ($this->isEmpty()) {
            return false;
        }

        if ($node == null && $this->root) {
            $node = $this->root;
        }

        echo str_repeat('-', $depth);
        echo $node->data;
        echo "\n";

        if ($node->left != null) {
            $depth = $this->traverseDFS($node->left, ++$depth);
        }
        if($node->right != null){
            $depth = $this->traverseDFS($node->right, ++$depth);
        }
        --$depth;
        return $depth;
    }

    public function traverseBFS()
    {
        if ($this->isEmpty()) {
            return false;
        }
        $queue = new SplQueue();
        $queue->enqueue($this->root);
        $level = 0.5;

        while(!$queue->isEmpty()) {
            $node = $queue->dequeue();
            echo str_repeat('-', floor($level) > 0 ? floor($level) : 0);
            echo $node->data;
            echo "\n";
            $node->left ? $queue->enqueue($node->left) : null;
            $node->right ? $queue->enqueue($node->right): null;
            if (!$node->left && !$node->right) {
                $level = $level - 0.2;
            }
            $level = $level + 0.5;
        }
    }
}

$bsTree = new BSTree();
$bsTree->insert(7);
$bsTree->insert(4);
$bsTree->insert(8);
$bsTree->insert(3);
$bsTree->insert(5);
$bsTree->insert(9);
$bsTree->traverseDFS();
echo "\n";
$bsTree->traverseBFS();

echo "\n";
echo "\n";
$bsTree = new BSTree();
$bsTree->insert(5);
$bsTree->insert(6);
$bsTree->insert(7);
$bsTree->insert(3);
$bsTree->insert(4);
$bsTree->insert(2);
$bsTree->traverseDFS();
echo "\n";
$bsTree->traverseBFS();