<?php
$alphabet = "abcdefghijklmnopqrstuvwxyz";
$str = strtolower(readline());
for ($i = 0; $i < strlen($str); $i++) {
    $letter = $str[$i];
    $index = strpos($alphabet, $letter);
    echo "$letter -> $index" . PHP_EOL;
}
