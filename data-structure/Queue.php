<?php

class Queue {
    private $queue = array();
    private $front;
    private $rear;

    public function __construct()
    {
        $this->front = -1;
        $this->rear = -1;
    }

    public function enqueue($data)
    {
        $index = ++$this->rear;
        $this->queue[$index] = $data;
        return $index;
    }

    public function dequeue()
    {
        if ($this->front == $this->rear) {
            echo "queue is empty \n";
            return null;
        }
        $index = ++$this->front;
        $data = $this->queue[$index];
        unset($this->queue[$index]);
        return $data;
    }

    public function getQueue()
    {
        return $this->queue;
    }

    public function isEmpty()
    {
        if ($this->front == $this->rear) {
          echo "Queue is empty. \n";
          return true;
        } else {
          echo "Queue is not empty. \n";
          return false;
        }
    }

    public function getFirst()
    {
        if ($this->front != $this->rear) {
            $index = $this->front;
            return $this->queue[++$index];
        } else {
            echo "Queue is empty. \n";
        }
        return null;
    }

    public function getLast()
    {
        if ($this->front != $this->rear) {
            return $this->queue[$this->rear];
        } else {
            echo "Queue is empty. \n";
        }
        return null;
    }

    public function size()
    {
        return $this->rear - $this->front;
    }
}

$queue = new Queue();
$queue->enqueue('tarek');
$queue->enqueue('monjur');
$queue->enqueue('nipu');
$queue->enqueue('muntasir');
var_dump($queue->getQueue());
$queue->dequeue();
var_dump($queue->getQueue());
var_dump($queue->isEmpty());
echo $queue->getFirst();
echo "\n";
echo $queue->getLast();
echo "\n";
echo $queue->size();
echo "\n";
