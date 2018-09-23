<?php
$num = (int) readline();
for ($i = 1; $i <= $num; $i++) {
    $number = $i;
    $sumDigits = 0;
    while ($number != 0) {
        $sumDigits = $sumDigits + ($number % 10);
        $number = floor($number / 10);
    }
    $isSpecial = false;
    if ($sumDigits == 5 || $sumDigits == 7 || $sumDigits == 11) {
        $isSpecial = true;
    }
    echo $i." -> ".($isSpecial ? "True" : "False")."\n";
}
