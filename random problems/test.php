<?php
$filename = '..test.html';
if (preg_match('/(\.\.)|(\/)/', $filename)) {
    echo 'filename is invalid' . PHP_EOL;
} else {
    echo 'filename is valid' . PHP_EOL;
}