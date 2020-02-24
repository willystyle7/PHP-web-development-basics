<?php
$str = preg_split('/,\s*/', readline());
$demons = [];
foreach ($str as $demon) {
    $demon = str_replace(" ", "", $demon);
    $healthSum = 0;
    preg_match_all('/[^0-9\s.\/+*-]/', $demon, $latterMach);
    foreach ($latterMach[0] as $demonName) {
        $healthSum += ord($demonName);
    }
    preg_match_all('/[+-]?\d+\.?\d*/', $demon, $matchNum);
    $damageSum = array_sum($matchNum[0]);
    preg_match_all('/[\/*]/', $demon, $operandsMatches);
    foreach ($operandsMatches[0] as $operands) {
        if ($operands == "*") {
            $damageSum *= 2;
        } elseif ($operands == "/") {
            $damageSum /= 2;
        }
    }
    $demons[$demon] = [
        'health' => $healthSum,
        'damage' => $damageSum
    ];
}
ksort($demons);
foreach ($demons as $name => $value) {
    $damageFormatted = number_format($value['damage'], 2, '.', '');
    echo "$name - {$value['health']} health, $damageFormatted damage" . PHP_EOL;
}
