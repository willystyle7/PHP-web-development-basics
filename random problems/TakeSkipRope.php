<?php
$input = readline();
$number = [];
$noNumber = [];
$take = [];
$skip = [];
$result = "";
for ($i = 0; $i < strlen($input); $i++) {
    if (ctype_digit($input[$i])) {
        $number[] = $input[$i];
    } else {
        $noNumber[] = $input[$i];
    }
}
for ($i = 0; $i < count($number); $i++) {
    if ($i % 2 == 0) {
        $take[] = $number[$i];
    } else {
        $skip[] = $number[$i];
    }
}
$currentIndex = 0;
for ($i = 0; $i < count($take); $i++) {
    $result .= implode("", array_slice($noNumber, $currentIndex, $take[$i]));
    $currentIndex += $take[$i] + $skip[$i];
}
echo $result;
