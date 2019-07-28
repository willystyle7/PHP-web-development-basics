<?php
$arr = explode(" ", readline());
while (true) {
    $input = explode(" ", readline());
    $comand = $input[0];
    if ($comand == "End") {
        break;
    }
    switch ($comand) {
        case "Add":
            $element = $input[1];
            $arr[] = $element;
            break;
        case "Insert":
            //Insert {number} {index} - insert number at given index
            $indexArr = $input[2];
            $number = $input[1];
            if ($indexArr >= 0 && $indexArr < count($arr)) {
                array_splice($arr, $indexArr, 0, $number);
            } else {
                echo "Invalid index" . PHP_EOL;
            }
            break;
        case "Remove":
            $indexArr = $input[1];
            if ($indexArr >= 0 && $indexArr < count($arr)) {
                array_splice($arr, $indexArr, 1);
            } else {
                echo "Invalid index" . PHP_EOL;
            }
            break;
        case "Shift":
            $count = $input[2];
            if ($input[1] === "left") {
                for ($i=0; $i < $count; $i++) {
                    $first = array_shift($arr);
                    $arr[] = $first;
                }
            } elseif ($input[1] === "right") {
                for ($i=0; $i < $count; $i++) {
                    $last = array_pop($arr);
                    array_splice($arr, 0, 0, $last);
                }
            }
            break;
        default:
            //
    }
}
//print_r($arr);
echo implode(" ", $arr);
