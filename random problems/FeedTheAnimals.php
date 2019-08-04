<?php
$animals = [];
$area = [];
$input = readline();
while ($input !== 'Last Info') {
    $args = explode(":", $input);
    $action = $args[0];
    $animalName = $args[1];
    $givenFood = intval($args[2]);
    $areaName = $args[3];
    if ($action == 'Add') {
        if (!key_exists($animalName, $animals)) {
            $animals[$animalName] = 0;
            if (!key_exists($areaName, $area)) {
                $area[$areaName] = 0;
            }
            $area[$areaName] += 1;
        }
        $animals[$animalName] += $givenFood;
    } else if ($action == 'Feed') {
        if (key_exists($animalName, $animals)) {
            $animals[$animalName] -= intval($givenFood);
            if ($animals[$animalName] <= 0) {
                echo "$animalName was successfully fed" . PHP_EOL;
                unset($animals[$animalName]);
                $area[$areaName] -= 1;
            }
        }
    }
    $input = readline();
}
//sort animals
ksort($animals);
arsort($animals);
//output
echo 'Animals:' . PHP_EOL;
foreach ($animals as $hungryAnimal => $foodToGive) {
    if ($foodToGive > 0) {
        echo $hungryAnimal . " -> " . $foodToGive . 'g' . PHP_EOL;
    }
}
//sort areas
arsort($area);
echo 'Areas with hungry animals:' . PHP_EOL;
foreach ($area as $anArea => $count) {
    if ($count > 0) {
        echo $anArea . " : " . $count . PHP_EOL;
    }
}
