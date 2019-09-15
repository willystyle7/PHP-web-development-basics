<?php
$html = '';
$title = readline();
$html = '<h1>' . PHP_EOL . "\t" . $title . PHP_EOL . '</h1>' . PHP_EOL;
$article = readline();
$html .= '<article>' . PHP_EOL . "\t" . $article . PHP_EOL . '</article>' . PHP_EOL;
while (($comment = readline()) != 'end of comments') {
    $html .= '<div>' . PHP_EOL . "\t" . $comment . PHP_EOL . '</div>' . PHP_EOL;
}
echo $html;
