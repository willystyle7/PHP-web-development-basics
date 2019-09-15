<?php
$input = explode(", ", readline());
$finalResult = array_shift($input);

foreach ($input as $startWeigth) {
    echo "Processing chunk $startWeigth microns" . PHP_EOL;
    $count = 0;
    while (Cut($startWeigth) >= $finalResult) {
        $count++;
        $startWeigth = Cut($startWeigth);
    }
    if ($count > 0) {
        echo "Cut x$count" . PHP_EOL;
        $startWeigth = TransportingAndWashing($startWeigth);
    }
    $count = 0;
    while (Lap($startWeigth) >= $finalResult) {
        $count++;
        $startWeigth = Lap($startWeigth);
    }
    if ($count != 0) {
        echo "Lap x$count" . PHP_EOL;
        $startWeigth = TransportingAndWashing($startWeigth);
    }
    $count = 0;
    while (Grind($startWeigth) >= $finalResult) {
        $count++;
        $startWeigth = Grind($startWeigth);
    }
    if ($count > 0) {
        echo "Grind x$count" . PHP_EOL;
        $startWeigth = TransportingAndWashing($startWeigth);
    }
    $count = 0;
    while (Etch($startWeigth) >= $finalResult - 1) {
        $count++;
        $startWeigth = Etch($startWeigth);
    }
    if ($count > 0) {
        echo "Etch x$count" . PHP_EOL;
        $startWeigth = TransportingAndWashing($startWeigth);
    }

    if ($startWeigth == $finalResult - 1) {
        $startWeigth = Xray($startWeigth);
        echo "X-ray x1" . PHP_EOL;
    }

    echo "Finished crystal $startWeigth microns" . PHP_EOL;;
}

function TransportingAndWashing($a)
{
    echo "Transporting and washing" . PHP_EOL;
    return floor($a);
}

function Cut($a)
{
    $a /= 4;
    return $a;
}

function Lap($a)
{
    $a -= 0.2 * $a;
    return $a;
}

function Grind($a)
{
    $a -= 20;
    return $a;
}

function Etch($a)
{
    $a -= 2;
    return $a;
}

function Xray($a)
{
    $a += 1;
    return $a;
}
