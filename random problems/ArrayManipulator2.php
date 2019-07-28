<?php
$input = array_map('intval', explode(" ", preg_replace('/\s+/', ' ', trim(readline()))));

while (1) {
    $command = explode(" ", preg_replace('/\s+/', ' ', trim(readline())));
    if ($command[0] == "end") {
        break;
    }
    if ($command[0] == "exchange") {
        $index = intval($command[1]);
        if ($index >= 0 && $index < count($input)) {
            $input = exchange($input, $index);
        } else {
            echo "Invalid index" . PHP_EOL;
        }
    }
    if ($command[0] == "max") {
        echo findMax($input, $command[1]) . PHP_EOL;
    }
    if ($command[0] == "min") {
        echo findMin($input, $command[1]) . PHP_EOL;
    }
    if ($command[0] == "first") {
        echo firstElements($input, $command) . PHP_EOL;
    }
    if ($command[0] == "last") {
        echo lastElements($input, $command) . PHP_EOL;
    }
}
echo "[" . implode(", ", $input) . "]";

function exchange($arr, $index)
{
    $firstPart = array_slice($arr, 0, $index + 1);
    $secondPart = array_slice($arr, $index + 1);
    return array_merge($secondPart, $firstPart);
}
function lastElements($arr, $command)
{
    $count = intval($command[1]);
    $result = [];
    if ($count > count($arr)) {
        return "Invalid count";
    } else {
        if ($command[2] === "odd") {
            $result = array_filter($arr, function ($a) {
                return $a % 2 === 1;
            });
        } else {
            $result = array_filter($arr, function ($a) {
                return $a % 2 === 0;
            });
        }
        $result = array_slice($result, -$count);
        return "[" . implode(", ", $result) . "]";
    }
}
function firstElements($arr, $command)
{
    $count = intval($command[1]);
    $result = [];
    if ($count > count($arr)) {
        return "Invalid count";
    } else {
        if ($command[2] === "odd") {
            $result = array_filter($arr, function ($a) {
                return $a % 2 === 1;
            });
        } else {
            $result = array_filter($arr, function ($a) {
                return $a % 2 === 0;
            });
        }
        $result = array_slice($result, 0, $count);
        return "[" . implode(", ", $result) . "]";
    }
}
function findMin($arr, $type)
{
    if ($type === "odd") {
        $minOddIndex = -1;
        $minOdd = PHP_INT_MAX;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] % 2 !== 0 && $arr[$i] <= $minOdd) {
                $minOdd = $arr[$i];
                $minOddIndex = $i;
            }
        }
        return (($minOddIndex >= 0) ? $minOddIndex : "No matches");
    }
    if ($type === "even") {
        $minEvenIndex = -1;
        $minEven = PHP_INT_MAX;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] % 2 === 0 && $arr[$i] <= $minEven) {
                $minEven = $arr[$i];
                $minEvenIndex = $i;
            }
        }
        return (($minEvenIndex >= 0) ? $minEvenIndex : "No matches");
    }
}
function findMax($arr, $type)
{
    if ($type === "odd") {
        $maxOddIndex = -1;
        $maxOdd = PHP_INT_MIN;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] % 2 !== 0 && $arr[$i] >= $maxOdd) {
                $maxOdd = $arr[$i];
                $maxOddIndex = $i;
            }
        }
        return (($maxOddIndex >= 0) ? $maxOddIndex : "No matches");
    }
    if ($type === "even") {
        $maxEvenIndex = -1;
        $maxEven = PHP_INT_MIN;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] % 2 === 0 && $arr[$i] >= $maxEven) {
                $maxEven = $arr[$i];
                $maxEvenIndex = $i;
            }
        }
        return (($maxEvenIndex >= 0) ? $maxEvenIndex : "No matches");
    }
}
