<?php
$teams = [];
$input = readline();
while ($input !== 'Result') {
    $parts = array_map('clean', explode('|', $input));
    if ($parts[0] === strtoupper($parts[0])) {
        list($team, $player, $score) = $parts;
    } else {
        list($player, $team, $score) = $parts;
    }
    if (!key_exists($team, $teams)) {
        $teams[$team] = [];
    }
    $teams[$team][$player] = $score;
    $input = readline();
}
uasort($teams, function($a, $b) {
    return array_sum($b) - array_sum($a);
});
foreach ($teams as $team => $players) {
    echo $team . ' => ' . (array_sum($players)) . PHP_EOL;
    arsort($players);
    $bestPlayer = array_keys($players)[0];
    echo "Most points scored by $bestPlayer" . PHP_EOL;
    // foreach ($players as $player => $score) {
    //     echo $player . ' -> ' . $score . PHP_EOL;
    // }
}

function clean($str) {
    $pattern = '/[@%&$*]+/i';
    return preg_replace($pattern, '', $str);
}