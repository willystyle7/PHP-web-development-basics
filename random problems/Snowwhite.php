<?php
$input = readline();
$dwarfs = [];
while ($input !== "Once upon a time") {
    $args = explode(" <:> ", $input);
    $name = $args[0];
    $hatColor = $args[1];
    $physics = intval($args[2]);
    $newDwarf = ['name' => $name, 'hatColor' => $hatColor, 'physics' => $physics];
    $found = false;
    foreach ($dwarfs as $index => $dwarf) {
        if ($dwarf['name'] === $name && $dwarf['hatColor'] === $hatColor) {
            if ($dwarf['physics'] >= $physics) {
                $found = true;
                break;
            } else {
                array_splice($dwarfs, $index, 1);
                break;
            }
        }
    }
    if (!$found) {
        $dwarfs[] = $newDwarf;
    }
    $input = readline();
}

usort($dwarfs, function ($dwarf1, $dwarf2) use ($dwarfs) {
    if ($dwarf2['physics'] === $dwarf1['physics']) {
        $countHats1 = count(array_filter($dwarfs, function($dwarf) use ($dwarf1) {return $dwarf['hatColor'] === $dwarf1['hatColor'];}));
        $countHats2 = count(array_filter($dwarfs, function($dwarf) use($dwarf2) {return $dwarf['hatColor'] === $dwarf2['hatColor'];}));
        return $countHats2 - $countHats1;
    }
    return $dwarf2['physics'] - $dwarf1['physics'];
});

foreach ($dwarfs as $dwarf) {
    echo "(${dwarf['hatColor']}) ${dwarf['name']} <-> ${dwarf['physics']}" . PHP_EOL;
}

