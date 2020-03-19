<?php
$wantedName = readline();
$input = readline();
while ($input !== 'Sign up') {
    $args = explode(' ', $input);
    $command = $args[0];
    switch ($command) {
        case 'Case':
            $type = $args[1];
            $wantedName = $type === 'lower' ? strtolower($wantedName) : strtoupper($wantedName);
            echo $wantedName . PHP_EOL;
            break;
        case 'Reverse':
            $startIndex = $args[1];
            $endIndex = $args[2];
            $lenght = $endIndex - $startIndex + 1;
            if ($startIndex >= 0 && $endIndex < strlen($wantedName) && $startIndex <= $endIndex) {
                $subString = substr($wantedName, $startIndex, $lenght);
                $subString = strrev($subString);
                echo $subString . PHP_EOL;
            }
            break;
        case 'Cut':
            $cutSubstring = $args[1];
            str_replace($cutSubstring, '', $wantedName, $count);
            if ($count > 0) {
                $wantedName = str_replace($cutSubstring, '', $wantedName);
                echo $wantedName . PHP_EOL;
            } else {
                echo "The word $wantedName doesn't contain $cutSubstring." . PHP_EOL;
            }
            break;
        case 'Replace':
            $char = $args[1];
            $wantedName = str_replace($char, '*', $wantedName);
            echo $wantedName . PHP_EOL;
            break;
        case 'Check':
            $char = $args[1];
            echo (strpos($wantedName, $char) === false ? "Your username must contain $char." : 'Valid') . PHP_EOL;
            break;
    }
    $input = readline();
}
