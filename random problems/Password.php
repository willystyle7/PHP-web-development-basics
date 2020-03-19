<?php
$n = readline();
$regex = '/^(.+?)>(\d{3})\|([a-z]{3})\|([A-Z]{3})\|([^<>]{3})<\1$/';
for ($i = 0; $i < $n; $i++) {
    $password = readline();
    if (preg_match($regex, $password, $matches)) {
        // var_dump($matches);
        echo "Password: " . $matches[2] . $matches[3] . $matches[4] . $matches[5] . PHP_EOL;
    } else {
        echo "Try another password!" . PHP_EOL;
    }
}




