<?php
$arr = array_map("intval", explode(" ", readline()));
$input = readline();
while ($input != "end") {
    $split = explode(" ", $input);
    switch ($split[0]) {
        case "exchange":
            $arr = Exchange($arr, intval($split[1]));
            break;
        case "max":
            MaxEven($arr, $split[1] == "even");
            break;
        case "min":
            MinEven($arr, $split[1] == "even");
            break;
        case "first":
            First($arr, $split[2] == "even", intval($split[1]));
            break;
        case "last":
            Last($arr, $split[2] == "even", intval($split[1]));
            break;
    }
    $input = readline();
}
echo "[" . implode(", ", $arr) . "]";

function Exchange($arr, $index)
{
    if ($index >= count($arr) || $index < 0) {
        echo "Invalid index\n";
        return $arr;
    }
    for ($i = 0; $i <= $index; $i++) {
        $temp = array_shift($arr);
        $arr[] = $temp;
    }
    return $arr;
}

function MaxEven($arr, $even)
{
    $maxIndex = -1;
    for ($currIndex = 0; $currIndex < count($arr); $currIndex++) {
        if ($arr[$currIndex] % 2 == ($even ? 0 : 1) && ($maxIndex == -1 || $arr[$currIndex] >= $arr[$maxIndex]))
            $maxIndex = $currIndex;
    }
    echo ($maxIndex != -1 ? "$maxIndex\n" : "No matches\n");
}

function MinEven($arr, $even)
{
    $minIndex = -1;
    for ($currIndex = 0; $currIndex < count($arr); $currIndex++) {
        if ($arr[$currIndex] % 2 == ($even ? 0 : 1) && ($minIndex == -1 || $arr[$currIndex] <= $arr[$minIndex]))
            $minIndex = $currIndex;
    }
    echo ($minIndex != -1 ? "$minIndex\n" : "No matches\n");
}

function First($arr, $even, $count)
{
    if ($count > count($arr)) {
        echo "Invalid count\n";
        return;
    }
    $list = [];
    for ($currIndex = 0; $currIndex < count($arr) && count($list) < $count; $currIndex++) {
        if ($arr[$currIndex] % 2 == ($even ? 0 : 1)) {
            $list[] = $arr[$currIndex];
        }
    }
    echo "[" . implode(", ", $list) . "]" . PHP_EOL;
}

function Last($arr, $even, $count)
{
    if ($count > count($arr)) {
        echo "Invalid count\n";
        return;
    }
    $list = [];
    for ($i = count($arr) - 1; $i >= 0 && count($list) < $count; $i--) {
        if ($arr[$i] % 2 == ($even ? 0 : 1)) {
            $list[] = $arr[$i];
        }
    }
    $list = array_reverse($list);
    echo "[" . implode(", ", $list) . "]" . PHP_EOL;
}
