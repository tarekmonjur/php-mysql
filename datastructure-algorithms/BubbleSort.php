<?php

function bubbleSort1(...$list)
{
    $flag = 0;
    foreach($list as $v) {
        foreach ($list as $k => $v) {
            if (isset($list[$k+1]) && $list[$k+1] < $list[$k]) {
                $temp = $list[$k+1];
                $list[$k+1] = $list[$k];
                $list[$k] = $temp;
            }
            $flag++;
        }
        $flag++;
    }
    echo $flag."\n";
    print_r($list);
}

bubbleSort1(4,2,6,9,3,1,5);



function bubbleSort2(...$list)
{
    $flag = 0;
    $count = count($list);
    for($j=1; $j <= $count; $j++) {
        for ($i=0; $i < $count - $j; $i++) {
            if ($list[$i] > $list[$i+1]) {
                $temp = $list[$i+1];
                $list[$i+1] = $list[$i];
                $list[$i] = $temp;
            }
            $flag++;
        }
        $flag++;
    }
    echo $flag."\n";
    print_r($list);
}

bubbleSort2(4,2,6,9,3,1,5);
