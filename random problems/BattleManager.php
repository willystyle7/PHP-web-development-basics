<?php
$input = readline();
$battles = [];
while ($input != "Results") {
    $comand = explode(":", $input);
    switch ($comand[0]) {
        case "Add":
            $personName = $comand[1];
            $health = $comand[2];
            $energy = $comand[3];
            if (!key_exists($personName, $battles)) {
                // $battles[$personName] = [];
                $battles[$personName]['health'] = 0;
                $battles[$personName]['energy'] = $energy;
            }
            $battles[$personName]['health'] += $health;
            // $battles[$personName]['energy'] = $energy;
            break;
        case "Delete":
            $personName = $comand[1];
            if ($personName == "All") {
                foreach ($battles as $key => $val) {
                    unset($battles[$key]);
                }
            }
            if (key_exists($personName, $battles)) {
                unset($battles[$personName]);
            }
            break;
        case "Attack":
            // Attack:Clark:Mark:500
            $attackerName = $comand[1];
            $defenderName = $comand[2];
            $damage = $comand[3];
            if (key_exists($attackerName, $battles) && key_exists($defenderName, $battles)) {
                $battles[$defenderName]['health'] -= $damage;
                $battles[$attackerName]['energy'] -= 1;
                if ($battles[$defenderName]['health'] <= 0) {
                    unset($battles[$defenderName]);
                    echo "$defenderName was disqualified!\n";
                }
                if ($battles[$attackerName]['energy'] <= 0) {
                    unset($battles[$attackerName]);
                    echo "$attackerName was disqualified!\n";
                }
            }
            break;
    }
    $input = readline();
}
$count = count($battles);
echo "People count: $count\n";
// ksort($battles);
uksort($battles, 'strcasecmp');
// ksort($battles, SORT_STRING | SORT_FLAG_CASE);
// uksort($battles, function ($a, $b) { return $a <=> $b; });

// arsort($battles);
// uasort($battles, 'cmp');
uasort($battles, function ($a, $b) { return $b['health'] - $a['health']; });

foreach ($battles as $key => $val) {
    echo "$key - ${val['health']} - ${val['energy']}\n";
}

function cmp($a, $b) {
    if ($a['health'] == $b['health']) {
        return 0;
    }
    return $a['health'] - $b['health'] > 0 ? -1 : 1;
}

