<?php

function quickSort($data, $first, $last)
{
    if ($first < $last) {
        [$mid, $data] = partition($data, $first, $last);
        // echo $first."-".$mid."-".$last."\n";
        quickSort($data, $first, $mid-1);
        quickSort($data, $mid+1, $last);
    }
    return $data;
}

function partition($data, $first, $last)
{
    $pivotValue = $data[$first];
    $lower = $first + 1;
    $upper = $last;
    $done = false;

    while (!$done) 
    {
        $GLOBALS['count']++;
        // check value from left to right
        while ($lower <= $upper && $data[$lower] <= $pivotValue) {
            $lower++;
            $GLOBALS['count']++;
        }

        // check value from right to left
        while ($upper >= $lower && $data[$upper] >= $pivotValue) {
            $upper--;
            $GLOBALS['count']++;
        }

        if ($upper < $lower) {
            $done = true;
        } else {
            // exchange value until cross upper and lower point.
            echo "lower=".$lower.", upper=".$upper."\n";
            $temp = $data[$lower];
            $data[$lower] = $data[$upper];
            $data[$upper] = $temp;
        }
    }

    // exchange the pivot value with split point.
    $temp = $data[$upper];
    $data[$upper] = $data[$first];
    $data[$first] = $temp;
    
    return [$upper, $data];

}

$GLOBALS['count'] = 0;
$list = [6,20,8,19,56,23,87,41,49,53];
$data = quickSort($list, 0, count($list)-1);
print_r($data);
echo $GLOBALS['count']."\n";

$GLOBALS['count'] = 0;
$list = [4,2,6,9,3,1,5];
$data = quickSort($list, 0, count($list)-1);
print_r($data);
echo $GLOBALS['count']."\n";