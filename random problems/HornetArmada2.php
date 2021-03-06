<?php
$n = intval(readline());
$legionsWithActivity = [];
$legionsWithSoldiers = [];
for ($i = 0; $i < $n; $i++) {
    // $a = readline();
    $input = readline();
    preg_match('/(\d+)\s\=\s(.+)\s\-\>\s(.+)\:(\d+)/', $input, $command);
    $lastActivity = $command[1];
    $legionName = $command[2];
    $soldierType = $command[3];
    $soldierCount = $command[4];
    if (!key_exists($legionName, $legionsWithActivity)) {
        $legionsWithActivity[$legionName] = $lastActivity;
        $legionsWithSoldiers[$legionName] = [];
    }
    if (!key_exists($soldierType, $legionsWithSoldiers[$legionName])) {
        $legionsWithSoldiers[$legionName][$soldierType] = 0;
    }
    if ($lastActivity > $legionsWithActivity[$legionName]) {
        $legionsWithActivity[$legionName] = $lastActivity;
    }
    $legionsWithSoldiers[$legionName][$soldierType] += $soldierCount;
}
$command = readline();
$strpos = strpos($command, "\\");
if ($strpos !== false) {
    $commands = explode("\\", $command);
    $activity = intval($commands[0]);
    $solderType = $commands[1];
    uksort($legionsWithSoldiers, function ($a, $b) use ($legionsWithSoldiers, $solderType) {
        if ($legionsWithSoldiers[$a][$solderType] === $legionsWithSoldiers[$b][$solderType]) return array_search($a, array_keys($legionsWithSoldiers)) - array_search($b, array_keys($legionsWithSoldiers));
        return $legionsWithSoldiers[$b][$solderType] - $legionsWithSoldiers[$a][$solderType];
    });
    foreach ($legionsWithSoldiers as $key => $item) {
        if ($legionsWithActivity[$key] < $activity && key_exists($solderType, $item)) {
            echo "$key -> $item[$solderType]\n";
        }
    }
} else {
    $solderType = $command;
    uksort($legionsWithActivity, function ($a, $b) use ($legionsWithActivity) {
        if ($legionsWithActivity[$a] === $legionsWithActivity[$b]) return strcasecmp($a, $b);
        return $legionsWithActivity[$b] - $legionsWithActivity[$a];
    });
    foreach ($legionsWithActivity as $key => $item) {
        if (key_exists($solderType, $legionsWithSoldiers[$key])) {
            echo "$item : $key\n";
        }
    }
}
