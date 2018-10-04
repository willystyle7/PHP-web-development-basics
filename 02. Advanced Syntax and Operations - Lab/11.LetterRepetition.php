<?php

$arr = readline();
$assocArr = [];

for ($i = 0; $i < strlen($arr); $i++) {
    $element = $arr[$i];

    if (!array_key_exists($element, $assocArr)) {
        $assocArr[$element] = 1;
    } else {
        $assocArr[$element] += 1;
    }
}

foreach ($assocArr as $key => $value) {
    echo $key . " -> " . $value . PHP_EOL;
}

?>