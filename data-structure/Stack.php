<?php


echo "Ds Stack \n";
$stack = new \Ds\Stack();

$stack->push("a");
$stack->push("b");
$stack->push("c", "d");
$stack->push(...["e", "f"]);

print_r($stack);
var_dump($stack->pop());
var_dump($stack->peek());
print_r($stack->toArray());
var_dump($stack->isEmpty());
var_dump($stack->count());
var_dump($stack->capacity());
?>