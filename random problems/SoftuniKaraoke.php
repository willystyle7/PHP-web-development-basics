<?php
$participants = array_map('trim', explode(", ", trim(readline())));
$songs = array_map('trim', explode(", ", trim(readline())));
$input = readline();
$args = [];
// Vankata, Dragana - Kukavice, Best Srabsko
while ($input != "dawn") {
    $command = array_map('trim', explode(", ", trim($input)));
    $singer = $command[0];
    $song = $command[1];
    $award = $command[2];
    if (!in_array($singer, $participants) || !in_array($song, $songs)) {
        $input = readline();
        continue;
    }
    if (!key_exists($singer, $args)) {
        $args[$singer] = [];
    }
    if (!in_array($award, $args[$singer])) {
        $args[$singer][] = $award;
    }
    $input = readline();
}
if (count($args) == 0) {
    echo "No awards";
    return;
}
// ksort($args);
// uasort($args, function ($a, $b) {
//     return count($b) - count($a);
// });
uksort($args, function ($a, $b) use ($args) {
    if (count($args[$b]) == count($args[$a])) return strcasecmp($a, $b);
    return count($args[$b]) - count($args[$a]);
});
foreach ($args as $key => $item) {
    $awardCount = count($item);
    echo "$key: $awardCount awards" . PHP_EOL;
    sort($item);
    foreach ($item as $value) {
        echo "--$value" . PHP_EOL;
    }
}
