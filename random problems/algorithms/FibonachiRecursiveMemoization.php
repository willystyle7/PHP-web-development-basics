<?php
echo "enter n = ";
$n = readline();

// variant with closure
function fibs($n) {
    $memo = [0, 1];
    $solve = function($n) use(&$memo, &$solve) {
        // var_dump($memo);
        if (array_key_exists($n, $memo)) {
            $member = $memo[$n];
        } else {
            $member = $solve($n - 1) + $solve($n - 2);
            $memo[$n] = $member;
        }
        return $member;
    };
    return $solve($n);
}

// variant with static
function fibs2($n) {
    static $memo = [0, 1];
    if (array_key_exists($n, $memo)) {
        $member = $memo[$n];
    } else {
        $member = fibs2($n - 1) + fibs2($n - 2);
        $memo[$n] = $member;
    }
    return $member;
}

// classics without memo
function fibs3($n) {
    if ($n <= 2) {
        return 1;
    } else {
        return fibs3($n - 1) + fibs3($n - 2);
    }
}

echo fibs($n) . PHP_EOL;
echo fibs2($n) . PHP_EOL;
echo fibs3($n) . PHP_EOL;