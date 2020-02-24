<?php
$str = explode("|", readline());
$firstPart = $str[0];
$secondPart = $str[1];
$thirdPart = $str[2];
preg_match('/([#$%*&])([A-Z]+)(\1)/', $firstPart, $matchCapitals);
$capitalLetters = str_split($matchCapitals[2]);
// var_dump($capitalLetters);
$words = [];
foreach ($capitalLetters as $letter) {
    $ascii = ord($letter);
    // echo $letter . ' - ' . $ascii . PHP_EOL;
    preg_match('/(' . $ascii . '):(\d\d)/', $secondPart, $matchLength);
    $words[] = [
        "letter" => $letter,
        "length" => intval($matchLength[2]) + 1
    ];
}
// var_dump($words);
$allWords = explode(" ", $thirdPart);
// var_dump($allWords);
foreach ($words as $word) {
    $letter = $word["letter"];
    $length = $word["length"];
    foreach ($allWords as $possibleWord) {
        if ($letter == $possibleWord[0] && $length == strlen($possibleWord)) {
            echo $possibleWord . PHP_EOL;
        }
    }
}

