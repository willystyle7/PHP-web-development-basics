<?php
$input = readline();
$title = '';
$content = '';
preg_match('/<title>([^<]*)<\/title>/', $input, $match);
$title = $match[1];
preg_match('/(<body>.*<\/body>)/', $input, $match);
$body = $match[1];
preg_match_all('/>([^<>]*)</', $body, $matches);
foreach ($matches[1] as $match) {
    $content .= $match . ' ';
}
$content = str_replace('\n', ' ', $content);
$content = preg_replace('/\s+/', ' ', $content);
echo "Title: $title" . PHP_EOL;
echo "Content: $content" . PHP_EOL;
