<?php
$n = intval(readline());
$regex = '/^([$%])([A-Z][a-z]{2,})\1: \[(\d+)\]\|\[(\d+)\]\|\[(\d+)\]\|$/';
for ($i = 0; $i < $n; $i++) {
    $message = readline();
    if (preg_match($regex, $message, $matches)) {
        // var_dump($matches);
        $tag = $matches[2];
        $decryptedMessage = chr($matches[3]) . chr($matches[4]) . chr($matches[5]);
        echo "{$tag}: {$decryptedMessage}\n";
    } else {
        echo "Valid message not found!" . PHP_EOL;
    }
}
