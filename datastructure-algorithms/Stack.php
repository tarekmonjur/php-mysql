<?php


echo "\n***Ds Stack***\n";
$s = new \Ds\Stack();

$s->push("a");
$s->push("b");
$s->push("c", "d");
$s->push(...["e", "f"]);

var_dump($s->pop());
var_dump($s->peek());
print_r($s->toArray());
var_dump($s->isEmpty());
var_dump($s->count());
var_dump($s->capacity());


class Stack {
    private $stack = array();
    private $top;

    public function __construct()
    {
        $this->top = -1;
    }

    public function push($data)
    {
        $index = ++$this->top;
        $this->stack[$index] = $data;
        return $index;
    }

    public function pop()
    {
        if ($this->top < 0) {
            echo "Stack is empty \n";
            return null;
        }
        return $this->stack[$this->top--];
    }

    public function isEmpty()
    {
        if ($this->top == -1) {
            echo "Stack is empty \n";
            return true;
        } else {
            echo "Stack is not empty \n";
            return false;
        }
    }
}

echo "\n****Stack****\n";
$stack = new Stack();
$stack->push('tarek');
$stack->push('monjur');
$stack->push('ahammed');
echo $stack->pop();
echo "\n";
echo $stack->pop();
echo "\n";
$stack->push('nipu');
echo $stack->pop();
echo "\n";
?>