<?php
$key = readline();
$teams = [];
while (true) {
    $command = readline();
    if ($command == "final") {
        break;
    }
    $input = explode(" ", $command);
    $homeTeamDecrypt = $input[0];
    $awayTeamDecrypt = $input[1];
    $homeTeam = strtoupper(strrev(explode($key, $homeTeamDecrypt)[1]));
    $awayTeam = strtoupper(strrev(explode($key, $awayTeamDecrypt)[1]));
    $goals = explode(":", $input[2]);
    $goalsHomeTeam = $goals[0];
    $goalsAwayTeam = $goals[1];

    $pointsHomeTeam = 1;
    $pointsAwayTeam = 1;
    if ($goalsHomeTeam > $goalsAwayTeam) {
        $pointsHomeTeam = 3;
        $pointsAwayTeam = 0;
    } elseif ($goalsHomeTeam < $goalsAwayTeam) {
        $pointsHomeTeam = 0;
        $pointsAwayTeam = 3;
    }
    addInfoToTeams($teams, $homeTeam, $pointsHomeTeam, $goalsHomeTeam);
    addInfoToTeams($teams, $awayTeam, $pointsAwayTeam, $goalsAwayTeam);
}

echo "League standings:" . PHP_EOL;
uksort($teams, function ($a, $b) use ($teams) {
    if ($teams[$a]["points"] === $teams[$b]["points"]) return strcmp($a, $b);
    return $teams[$b]["points"] - $teams[$a]["points"];
});
$position = 1;
foreach ($teams as $key => $value) {
    echo "$position. $key {$value['points']}" . PHP_EOL;
    $position++;
}
echo "Top 3 scored goals:" . PHP_EOL;
uksort($teams, function ($a, $b) use ($teams) {
    if ($teams[$a]["goals"] === $teams[$b]["goals"]) return strcmp($a, $b);
    return $teams[$b]["goals"] - $teams[$a]["goals"];
});
$teams = array_slice($teams, 0, 3);
foreach ($teams as $key => $value) {
    echo "- $key -> {$value['goals']}" . PHP_EOL;
}

function addInfoToTeams(&$teams, $team, $points, $goals) {
    if (!key_exists($team, $teams)) {
        $teams[$team] = [
            "points" =>  0,
            "goals" => 0
        ];
    }
    $teams[$team]['points'] += $points;
    $teams[$team]['goals'] += $goals;
}
