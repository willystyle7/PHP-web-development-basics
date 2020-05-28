<?php
$input = explode(',', preg_replace('/\s+/', '', readline()));
$demonDamages = [];
foreach ($input as $demon) {
    $healthPoints = 0;
    $damagePoints = 0;
    // $healthPoints = array_reduce(str_split($demon), function ($sum, $el) {
    //     ctype_alpha($el) ? $sum += ord($el) : false;
    //     return $sum;
    // }, 0);
    preg_match_all('/[^0-9\s.\/+*-]/', $demon, $charMach);
    foreach ($charMach[0] as $demonChar) {
        $healthPoints += ord($demonChar);
    }
    preg_match_all('/(-?\d*\.?\d+)/', $demon, $numberMatch);
    $damagePoints = array_reduce($numberMatch[0], function ($sum, $el) {
        return $sum = $sum + floatval($el);
    }, 0);
    for ($i = 0; $i < strlen($demon); $i++) {
        if ($demon[$i] == "*") {
            $damagePoints *= 2;
        }
        if ($demon[$i] == "/") {
            $damagePoints /= 2;
        }
    }
    $demonDamages[] = "{$demon} - {$healthPoints} health, " . number_format($damagePoints, 2, '.', '') . " damage";
}
sort($demonDamages);
foreach ($demonDamages as $demons) {
    echo "$demons\n";
}