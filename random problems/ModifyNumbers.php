<?php
$arr = explode(' ', trim(readline()));
$arr = array_map(floatval, $arr);
// $arr = explode(" ", readline());
$input = readline();
while ($input !== "end") {
    $args = explode(" ", $input);
    $comand = $args[0];
    switch ($comand) {
        case "swap":
            $index1 = $args[1];
            $index2 = $args[2];
            if (isset($arr[$index1]) && isset($arr[$index2])) {
                $temp = $arr[$index1];
                $arr[$index1] = $arr[$index2];
                $arr[$index2] = $temp;
            }
            break;
        case "multiply":
            $index1 = $args[1];
            $index2 = $args[2];
            if (isset($arr[$index1]) && isset($arr[$index2])) {
                $arr[$index1] = $arr[$index1] * $arr[$index2];
            }
            break;
        case "decrease":
            $index1 = $args[1];
            for ($i = 0; $i < count($arr); $i++) {
                $arr[$i] = $arr[$i] - $index1;
            }
            break;
        case "increase":
            $index1 = $args[1];
            for ($i = 0; $i < count($arr); $i++) {
                $arr[$i] += $index1;
            }
            break;
        case "remove":
            $index1 = $args[1];
            if (isset($arr[$index1])) {
                array_splice($arr, $index1, 1);
            }
            break;
    }
    $input = readline();
}
echo implode(", ", $arr);
