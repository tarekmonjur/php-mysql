<?php

function BinarySearch($find, $data)
{
    $first = 0;
    $last = count($data);
    while ($first <= $last) {
        $mid = round($first + ($last / 2));
        if ($data[$mid] == $find) {
            echo "found\n";
            return true;
        }
        if ($data[$mid] > $find) {
            $last = $mid - 1;
        } else {
            $first = $mid + 1;
        }
    }
    echo "not found\n";
    return false;
}

BinarySearch(5, [3,1,6,7,5,8,9]);
BinarySearch(4, [3,1,6,7,5,8,9]);