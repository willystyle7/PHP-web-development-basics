<?php
// order array first odd numbers ordered ascending, then even ordered descending

$array = [1, 2, 3, 4, 6, 3, 17, 22, 11, 30];

function cmp($a, $b)
{
    // if (($a % 2 === 0 && $b % 2 === 0) || ($a % 2 !== 0 && $b % 2 !== 0)) {
    //     return $a - $b;
    // }
    if ($a % 2 === 0 && $b % 2 === 0) {
        return $b - $a;
    }
    if ($a % 2 !== 0 && $b % 2 !== 0) {
        return $a - $b;
    }
    if ($a % 2 === 0 && $b % 2 !== 0) {
        return 1;
    }
    if ($a % 2 !== 0 && $b % 2 === 0) {
        return -1;
    }
}

usort($array, 'cmp');

print_r($array);
