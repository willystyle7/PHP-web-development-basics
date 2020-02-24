<?php
// https://stackoverflow.com/questions/4353739/preserve-key-order-stable-sort-when-sorting-with-phps-uasort
header('Content-type: text/plain');
for ($i = 0; $i < 10; $i++) {
    $arr['key-' . $i] = rand(1, 5) * 10;
}
// uasort($arr, function($a, $b) {
//     // sort condition may go here //
//     // Tried: return ($a == $b)?1:($a - $b); //
//     // Tried: return $a >= $b; //
//     return $a >= $b;
// });
uksort($arr, function ($a, $b) use ($arr) {
    if ($arr[$a] === $arr[$b]) return array_search($a, array_keys($arr)) - array_search($b, array_keys($arr));
    return $arr[$a] - $arr[$b];
});
print_r($arr);
