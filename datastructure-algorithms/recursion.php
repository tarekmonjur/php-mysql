<?php

function countDown($number)
{
    if ($number == 0) {
        echo "Done! \n";
        return;
    }
    echo $number."\n";
    countDown($number - 1);
    // echo $number++."\n";
    // echo "call stack \n";
}

// countDown(5);


function power($num, $pow)
{
    if ($pow == 0) {
        return 1;
    }
    echo $pow."\n";
    $r = $num * power($num, $pow-1);
    echo "call stack \n";
    echo $r."\n";
    return $r;
}

// echo power(2, 5);

function factorial($number)
{
    if ($number == 0) {
        return 1;
    }
    return $number * factorial($number -1);
}

echo factorial(4);