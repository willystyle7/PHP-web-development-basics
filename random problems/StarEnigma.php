<?php
$messagesNum = intval(readline());
$attacked = [];
$destroyed = [];
for ($i = 1; $i <= $messagesNum; $i++) {
    $messages = readline();
    $patternKey = '/[sStTaArR]/';
    preg_match_all($patternKey, $messages, $key);
    $keyAscii = count($key[0]);
    for ($d = 0; $d < strlen($messages); $d++) {
        $currentMess = ord($messages[$d]) - $keyAscii;
        $messages[$d] = chr($currentMess);
    }
    $patternMessage = '/@([A-Za-z]+)[^@\-!:>]*:([0-9]+)[^@\-!:>]*!([AD])![^@\-!:>]*->([0-9]*)/';
    if (preg_match($patternMessage, $messages, $match)) {
        $planetName = $match[1];
        $attack = $match[3];
        if ($attack == "A") {
            $attacked[] = $planetName;
        } else if ($attack == "D") {
            $destroyed[] = $planetName;
        }
    }
}

uasort($attacked, 'cmp');
echo "Attacked planets: " . count($attacked) . "\n";
foreach ($attacked as $item) {
    echo "-> $item\n";
}

uasort($destroyed, 'cmp');
echo "Destroyed planets: " . count($destroyed) . "\n";
foreach ($destroyed as $item) {
    echo "-> $item\n";
}

function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}
