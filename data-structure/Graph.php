<?php

class Graph {
    private $vertices;
    private $adjacency;

    public function __construct($vertices)
    {
        $this->vertices = $vertices;
        $this->adjacency($vertices);
    }

    private function adjacency($vertices) {
        foreach($vertices as $v) {
            $this->adjacency[$v] = [];
        }
    }

    public function addEdge($from, $to)
    {
        if (!in_array($to, $this->adjacency[$from])) {
            $this->adjacency[$from][] = $to;
        }
    }

    public function displayGraph()
    {
        foreach($this->adjacency as $key => $adjacency) {
            echo $key. " => ";
            foreach($adjacency as $value) {
                echo $value. ", ";
            }
            echo "\n";
        }
    }

    public function traverseByBFS($from, $to)
    {
        if (!$this->adjacency[$from] && !$this->adjacency[$to]) {
            echo "from and to not found on the graph";
            return false;
        }

        $visited = [];
        $path = [];
        $queue = new SplQueue();
        $queue->enqueue($from);
        $visited[$from] = true;
        $path[$from][] = $from;

        while (!$queue->isEmpty()) {
            $vertex = $queue->dequeue();
            
            if ($vertex === $to) {
                printf("Edge %s to %s is %d hops and path is %s \n", $from, $to, count($path[$to])-1, implode('->', $path[$to]));
                return $path;
            }

            foreach ($this->adjacency[$vertex] as $vtx) {
                if (!isset($visited[$vtx])) {
                    $visited[$vtx] = true;
                    $queue->enqueue($vtx);
                    $path[$vtx] = $path[$vertex];
                    $path[$vtx][] = $vtx;
                }
            }
        }
        echo "Edge not found on Graph \n";
        return [];
    }
}

$graph = new Graph(['A', 'B', 'C', 'D', 'E']);
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'A');
$graph->addEdge('B', 'D');
$graph->addEdge('B', 'E');
$graph->addEdge('C', 'A');
$graph->addEdge('C', 'E');
$graph->addEdge('D', 'B');
$graph->addEdge('D', 'E');
$graph->addEdge('E', 'B');
$graph->addEdge('E', 'D');
$graph->addEdge('E', 'C');
$graph->displayGraph();
$graph->traverseByBFS('A', 'D');
$graph->traverseByBFS('B', 'C');
$path = $graph->traverseByBFS('D', 'C');

echo "\n";
echo "\n";

$graph = new Graph(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'J', 'K']);
// directed graph
$graph->addEdge('A', 'F');
$graph->addEdge('A', 'C');
$graph->addEdge('A', 'B');
$graph->addEdge('B', 'G');
$graph->addEdge('B', 'C');
$graph->addEdge('C', 'F');
$graph->addEdge('D', 'C');
$graph->addEdge('E', 'D');
$graph->addEdge('E', 'C');
$graph->addEdge('E', 'J');
$graph->addEdge('F', 'D');
$graph->addEdge('G', 'C');
$graph->addEdge('G', 'E');
$graph->addEdge('J', 'D');
$graph->addEdge('J', 'K');
$graph->addEdge('K', 'E');
$graph->addEdge('K', 'G');
$graph->displayGraph();
$graph->traverseByBFS('A', 'J');