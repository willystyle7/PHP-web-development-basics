<?php

$crystals = explode(", ", readline());
$desiredThickness = array_shift($crystals);

$cut = function ($crystalThickness) {
    $crystalThickness /= 4;
    return $crystalThickness;
};

$lap = function ($crystalThickness) {
    $crystalThickness -= 0.2 * $crystalThickness;
    return $crystalThickness;
};

$grind = function ($crystalThickness) {
    $crystalThickness -= 20;
    return $crystalThickness;
};

$etch = function ($crystalThickness) {
    $crystalThickness -= 2;
    return $crystalThickness;
};

$xRay = function ($crystalThickness) {
    $crystalThickness += 1;
    return $crystalThickness;
};

$wash = function ($crystalThickness) {
    $crystalThickness = floor($crystalThickness);
    return $crystalThickness;
};

foreach ($crystals as $crystal) {
    $result = "Processing chunk $crystal microns\n";
    $operations = ['Cut' => $cut, 'Lap' => $lap, 'Grind' => $grind, 'Etch' => $etch];
    foreach ($operations as $operationName => $operation) {
        $newCrystal = $crystal;
        $count = -1;
        while ($newCrystal >= $desiredThickness - ($operationName == 'Etch' ? 1 : 0)) {
            $crystal = $newCrystal;
            $count += 1;
            $newCrystal = $operation($newCrystal);
        }

        if ($count > 0) {
            $result .= "$operationName x{$count}\n";
            $result .= "Transporting and washing\n";
            $crystal = $wash($crystal);
        }
    }

    if ($crystal < $desiredThickness) {
        $crystal = $xRay($crystal);
        $result .= "X-ray x1\n";
    }

    $result .= "Finished crystal $crystal microns\n";

    echo $result;
}
