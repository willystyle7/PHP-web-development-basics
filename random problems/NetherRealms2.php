<?php
$str = explode(",", readline());
$demons = [];
foreach ($str as $demon) {
    $demon = str_replace(' ', '', trim($demon));
    preg_match_all('/[^0-9+\-*\/\.]/', $demon, $latterMach);
    $healthSum = 0;
    foreach ($latterMach[0] as $demonName) {
        $healthSum += ord($demonName);
    }
    $demons[$demon]['health'] = $healthSum;
}
foreach ($demons as $key => $numbers) {
    preg_match_all('/([-+]?[0-9]*\.[0-9]+|[0-9]+)|([-+]?[0-9]+)/', $key, $matchNum);
    $damageSum = array_sum($matchNum[0]);
    preg_match_all('/[\/*]/', $key, $operandsMatches);
    foreach ($operandsMatches[0] as $operands) {
        if ($operands == "*") {
            $damageSum *= 2;
        } elseif ($operands == "/") {
            $damageSum /= 2;
        }
    }
    $demons[$key]['points'] = $damageSum;
}
ksort($demons);
foreach ($demons as $name => $value) {
    $damageFormatted = number_format($value['points'], 2, '.', '');
    echo "$name - {$value['health']} health, $damageFormatted damage" . PHP_EOL;
}
