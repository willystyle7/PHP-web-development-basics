<?php
$input = readline();
$battles = [];
while ($input != "Results") {
    $command = explode(":", $input);
    switch ($command[0]) {
        case "Add":
            $personName = $command[1];
            $health = intval($command[2]);
            $energy = intval($command[3]);
            if (!key_exists($personName, $battles)) {
                $battles[$personName] = [];
                $battles[$personName]['health'] = 0;
                $battles[$personName]['energy'] = $energy;
            }
            $battles[$personName]['health'] += $health;
            break;
        case "Delete":
            $personName = $command[1];
            if ($personName == "All") {
                $battles = [];
            }
            if (key_exists($personName, $battles)) {
                unset($battles[$personName]);
            }
            break;
        case "Attack":
            $attackerName = $command[1];
            $defenderName = $command[2];
            $damage = intval($command[3]);
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

uksort($battles, 'cmp');

function cmp($a, $b)
{
    if ($GLOBALS['battles'][$a]['health'] == $GLOBALS['battles'][$b]['health']) {
        if ($a == $b) {
            return 0;
        }
        return strcmp($a, $b);
    }
    return $GLOBALS['battles'][$a]['health'] - $GLOBALS['battles'][$b]['health'] > 0 ? -1 : 1;
}

foreach ($battles as $key => $val) {
    echo "$key - ${val['health']} - ${val['energy']}\n";
}
