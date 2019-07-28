<?php
$arr = explode(" ", readline());
while (true) {
    $comand = explode(" ", readline());
    if ($comand[0] == "3:1") {
        break;
    }
    switch ($comand[0]) {
        case "merge":
            $startIndex = $comand[1] < 0 ? 0 : $comand[1];
            $endIndex = $comand[2] >= count($arr) ? count($arr) - 1 : $comand[2];
            $elToMerge = '';
            for ($i = $startIndex; $i <= $endIndex; $i++) {
                $elToMerge .= $arr[$i];
            }
            array_splice($arr, $startIndex, $endIndex - $startIndex + 1, $elToMerge);
            break;
        case "divide":
            $index = $comand[1];
            $partitions = $comand[2];
            $element = $arr[$index];
            $partitionLen = floor(strlen($element) / $partitions);
            $lastPartitionLen = $partitionLen + (strlen($element) % $partitions);
            $elementsToAdd = [];
            for ($i = 0; $i < $partitions; $i++) {
                $len = $i == $partitions - 1 ? $lastPartitionLen : $partitionLen;
                $elementsToAdd[] = substr($element, $i * $partitionLen, $len);
            }
            array_splice($arr, $index, 1, $elementsToAdd);
            break;
    }
}
echo implode(" ", $arr);
