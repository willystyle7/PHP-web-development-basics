<?php

function middleCharacters($n)
{
    $len = strlen($n);
    if ($len % 2 == 0) {
        echo $n[$len / 2 - 1] . $n[$len / 2];
    } else {
        echo $n[floor($len / 2)];
    }
}

middleCharacters(readline());
