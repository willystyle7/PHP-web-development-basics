<?php
$arr = array_map('intval', explode(' ', readline()));
$index = intval(readline());
$sum = 0;
while (count($arr) > 0) {
    if ($index > count($arr) - 1) {
        $value = $arr[count($arr) - 1];
        array_splice($arr, count($arr) - 1, 1, $arr[0]);
    } elseif ($index < 0) {
        $value = $arr[0];
        array_splice($arr, 0, 1, $arr[count($arr) - 1]);
    } else {
        $value = $arr[$index];
        array_splice($arr, $index, 1);
    }
    $sum += $value;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] <= $value) {
            $arr[$i] += $value;
        } else {
            $arr[$i] -= $value;
        }
    }
    if (count($arr) > 0) {
        $index = intval(readline());
    }
}
echo $sum;
