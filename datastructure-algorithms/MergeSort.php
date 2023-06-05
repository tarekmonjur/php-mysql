<?php

function mergeSort($data, $c)
{
    $count = count($data);
    if ($count <= 1) {
        return [$data, $c];
    }

    $mid = round($count / 2);
    $leftData = array_slice($data, 0, $mid);
    $rightData = array_slice($data, $mid);

    [$leftData, $c] = mergeSort($leftData, $c);
    [$rightData, $c] = mergeSort($rightData, $c);

    // echo "start.....merge\n";
    // print_r($leftData);
    // print_r($rightData);
    $result = [];
    $l = 0;
    $r = 0;
    
    while ($l < count($leftData) && $r < count($rightData)) {
        // echo $leftData[$l]. " < ". $rightData[$r]. "\n";
        $c++;
        if ($leftData[$l] <= $rightData[$r]) {
            $result[] = $leftData[$l];
            $l++;
        } else {
            $result[] = $rightData[$r];
            $r++;
        }
    }

    while ($l < count($leftData)) {
        $c++;
        $result[] = $leftData[$l];
        $l++;
    }

    while ($r < count($rightData)) {
        $c++;
        $result[] = $rightData[$r];
        $r++;
    }

    return [$result, $c];
}

print_r(mergeSort([4,2,6,9,3,1,5], 0));
print_r(mergeSort([6,20,8,19,56,23,87,41,49,53], 0));