<?php

function linearSearch($find, $data)
{
    foreach($data as $value) {
        if ($value === $find) {
            echo "found\n";
            return true;
        }
    }
    echo "not found\n";
    return false;
}

linearSearch(5, [3,1,6,7,5,8,9]);