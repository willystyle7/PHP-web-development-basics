<?php
// $n = readline();
// for ($i = 0; $i < $n; $i++) {
//     // $nums = explode(" ", preg_replace('/\s+/', ' ', trim(readline())));
//     $nums = explode(' ', readline());
//     $greaterNum = $nums[0] > $nums[1] ? $nums[0] : $nums[1];
//     $sum = 0;
//     for ($j = 0; $j < strlen($greaterNum); $j++) {
//         $sum += intval($greaterNum[$j]);
//     }
//     echo $sum . PHP_EOL;
// }


$n = readline();
for ($i = 0; $i < $n; $i++) {
    $m = readline();
    $num1 = '';
    $num2 = '';
    $sum1 = 0;
    $sum2 = 0;
    $isNum1 = true;
    for ($j = 0; $j < strlen($m); $j++) {
        if ($m[$j] == ' ') {
            $isNum1 = false;
            continue;
        }
        if ($isNum1) {
            $num1 .= $m[$j];
            $sum1 += intval($m[$j]);
        } else {
            $num2 .= $m[$j];
            $sum2 += intval($m[$j]);
        }
    }
    if (intval($num1) > intval($num2)) {
        echo $sum1 . PHP_EOL;
    } else {
        echo $sum2 . PHP_EOL;
    }
}