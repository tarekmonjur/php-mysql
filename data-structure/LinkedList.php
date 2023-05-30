<?php

class Node {
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList {
    public $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function add($data)
    {
        $node = new Node($data);
        
        if (!$this->head) {
            $this->head = $node;
        } else {
            $current = $this->head;
            while($current->next != null) {
                $current = $current->next;
            }
            $current->next = $node;
        }
    }

    public function remove($data)
    {
        if ($this->head) {
            if ($this->head->data == $data) {
                $this->head = $this->head->next;
                return true;
            } else {
                $current = $this->head;
                $previous = null;
                while($current) {
                    if ($current->data == $data) {
                        if ($current->next != null) {
                            $previous->next = $current->next;
                        } else {
                            $previous->next = null;
                        }
                        return true;
                    }
                    $previous = $current;
                    $current = $current->next;
                }
            }
        }
        return false;
    }

    public function addFirst($data)
    {
        $node = new Node($data);
        if ($this->head) {
            $node->next = $this->head;
            $this->head = $node;
        } else {
            $this->head = $node;
        }
    }

    public function addAfter($data, $target)
    {
        if ($this->head) {
            $current = $this->head;
            while ($current != null) {
                if ($current->data == $target) {
                    $node = new Node($data);
                    $node->next = $current->next;
                    $current->next = $node;
                    return true;
                }
                $current = $current->next;
            }
        }
        return false;
    }

    public function addBefore($data, $target)
    {
        if ($this->head) {
            $current = $this->head;
            $previous = null;
            while ($current != null) {
                if ($current->data == $target) {
                    $node = new Node($data);
                    $node->next = $current;
                    if ($previous) {
                        $previous->next = $node;
                    } else {
                        $this->head = $node;
                    }
                    return true;
                }
                $previous = $current;
                $current = $current->next;
            }
        }
        return false;
    }

    public function render()
    {
        if ($this->head) {
            $current = $this->head;
            while ($current != null) {
                echo $current->data;
                echo "\n";
                $current = $current->next;
            }
        } else {
            echo "Linked list is empty";
        }
    }
}


$linkedList = new LinkedList();
$linkedList->add('tarek');
$linkedList->add('monjur');
$linkedList->add('ahammed');
$linkedList->add('muntasir');
$linkedList->render();
echo "\n";
$linkedList->remove('muntasir');
$linkedList->render();
echo "\n";
$linkedList->addFirst('muntasir');
$linkedList->addAfter('muntaha', 'muntasir');
$linkedList->addBefore('nipu', 'ahammed');
$linkedList->addBefore('nipu', 'muntasir');
$linkedList->render();
echo "\n";
