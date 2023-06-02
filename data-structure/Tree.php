<?php

class Node {
    public $data;
    public $level;
    public $child;

    public function __construct($data)
    {
        $this->data = $data;
        $this->level = 0;
        $this->child = [];
    }
}

class Tree {
    private $root;

    public function __construct($data)
    {
        $this->root = new Node($data);
    }

    public function add($parent, $child)
    {
        $node = new Node($child);
        $parent = $this->searchNode($this->root, $parent);
        if ($parent !== null) {
            $node->level = $parent->level+1;
            $parent->child[] = $node;
        } else {
            echo "parent node not found";
        }
    }

    public function searchNode($node, $data)
    {
        if ($node->data === $data) {
            return $node;
        }

        foreach($node->child as $child) {
            $find = $this->searchNode($child, $data);
            if ($find != null) {
                return $find;
            }
        }

        return null;
    }

    public function traverseDFS($nodes = null, $depth = 0)
    {
        if ($nodes == null) {
            $nodes = $this->root;
        }

        echo str_repeat('-', $depth);
        echo $nodes->data;
        echo "\n";

        foreach($nodes->child as $node) {
           $depth = $this->traverseDFS($node, ++$depth);
        }
        --$depth;
        return $depth;
    }

    public function traverseBFS()
    {
        $queue = new SplQueue();
        $queue->enqueue($this->root);

        while(!$queue->isEmpty()) {
            $node = $queue->dequeue();
            echo str_repeat('-', $node->level);
            echo $node->data;
            echo "\n";

            foreach($node->child as $child) {
                $queue->enqueue($child);
            }
        }
    }
}

$tree = new Tree('tarek');
$tree->add('tarek','monjur');
$tree->add('tarek','ahammed');
$tree->add('monjur','nipu');
$tree->add('nipu','muntasir');
$tree->add('nipu','muntaha');
// print_r($tree);
$tree->traverseDFS();
echo "\n";
echo "\n";
$tree->traverseBFS();

