<?php

function TearnarySearch($find, $data, $first=null, $last=null)
{
    if ($first == null && $last == null) {
        $first = 0;
        $last = count($data);
    }

    if ($first < $last) {
        $mid1 = round($first + ($last - $first) / 3);
        $mid2 = round($last - ($last - $first) / 3 );

        if ($mid1 == $find || $mid2 == $find) {
            echo "found\n";
            return true;
        }

        if($data[$mid1] > $find) {
            $last = $mid1 -1;
            return TearnarySearch($find, $data, $first, $last);
        } else if ($data[$mid2] > $find){
            $first = $mid1+1;
            $last = $mid2 -1;
            return TearnarySearch($find, $data, $first, $last);
        } else {
            $first = $mid2 + 1;
            return TearnarySearch($find, $data, $first, $last);
        }
    }
    echo "not found\n";
    return false;
}

TearnarySearch(7, [1,2,3,4,5,6,7,8,9,10,11]);
TearnarySearch(9, [1,2,3,4,5,6,7,8,9,10,11]);
TearnarySearch(4, [1,2,3,4,5,6,7,8,9,10,11]);
TearnarySearch(10, [1,2,3,4,5,6,7,8,9,10,11]);