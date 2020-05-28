<?php
$input = readline();
$playerPool = [];
while ($input !== "Season end") {
    $args = explode(" -> ", $input);
    if (count($args) > 2) {
        $player = $args[0];
        $position = $args[1];
        $skill = $args[2];
        if (!array_key_exists($player, $playerPool)) {
            $playerPool[$player][$position] = $skill;
        } else {
            if (!array_key_exists($position, $playerPool[$player])) {
                $playerPool[$player][$position] = $skill;
            } elseif ($playerPool[$player][$position] < $skill) {
                $playerPool[$player][$position] = $skill;
            }
        }
    }
    if (count($args) < 2) {
        $args = explode(" vs ", $input);
        $player1 = $args[0];
        $player2 = $args[1];
        $playing = false;
        if (array_key_exists($player1, $playerPool) && array_key_exists($player2, $playerPool)) {
            foreach ($playerPool[$player1] as $position1 => $skill1) {
                foreach ($playerPool[$player2] as $position2 => $skill2) {
                    if ($position1 == $position2) {
                        if ($skill1 < $skill2) {
                            unset($playerPool[$player1]);
                            $playing = true;
                            break;
                        } elseif ($skill1 > $skill2) {
                            unset($playerPool[$player2]);
                            $playing = true;
                            break;
                        }
                    }
                }
                if ($playing) {
                    break;
                }
            }
        }
    }
    $input = readline();
}

uksort($playerPool, function ($key1, $key2) use ($playerPool) {
    $sum1 = array_sum($playerPool[$key1]);
    $sum2 = array_sum($playerPool[$key2]);
    if ($sum1 === $sum2) return strcmp($key2, $key1);
    return $sum2 - $sum1;
});

foreach ($playerPool as $player => $positions) {
    uksort($positions, function ($key1, $key2) use ($positions) {
        $skill1 = $positions[$key1];
        $skill2 = $positions[$key2];
        if ($skill1 === $skill2) return strcmp($key1, $key2);
        return $skill2 - $skill1;
    });
    $totalSkill = array_sum($positions);
    echo "$player: $totalSkill skill" . PHP_EOL;
    foreach ($positions as $position => $skill) {
        echo "- $position <::> $skill" . PHP_EOL;
    }
}
