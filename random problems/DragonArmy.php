<?php
$n = readline();
$dragonsByType = [];
for ($i = 0; $i < $n; $i++) {
    $input = explode(" ", readline());
    $type = $input[0];
    $name = $input[1];
    $damage = $input[2] === 'null' ? 45 : intval($input[2]);
    $health = $input[3] === 'null' ? 250 : intval($input[3]);
    $armor = $input[4] === 'null' ? 10 : intval($input[4]);
    $dragonsByType[$type][$name]['damage'] = $damage;
    $dragonsByType[$type][$name]['health'] = $health;
    $dragonsByType[$type][$name]['armor'] = $armor;
}

foreach ($dragonsByType as $type => $dragons) {
    ksort($dragons);
    $sumDamage = 0;
    $sumHealth = 0;
    $sumArmor = 0;
    foreach ($dragons as $name => $dragon) {
        $sumDamage += $dragon['damage'];
        $sumHealth += $dragon['health'];
        $sumArmor += $dragon['armor'];
    }
    $count = count($dragons);
    $averageDamage = number_format($sumDamage / $count, 2, '.', '');
    $averageHealth = number_format($sumHealth / $count, 2, '.', '');
    $averageArmor = number_format($sumArmor / $count, 2, '.', '');
    echo "$type::($averageDamage/$averageHealth/$averageArmor)" . PHP_EOL;
    foreach ($dragons as $name => $dragon) {
        echo "-$name -> damage: ${dragon['damage']}, health: ${dragon['health']}, armor: ${dragon['armor']}" . PHP_EOL;
    }
}