<?php
$n = intval(readline());
$regex = '/^(@[#]{1,})([A-Z][A-Za-z0-9]{4,}[A-Z])(@[#]{1,})/';
foreach (range(1, $n) as $i) {
    $input = readline();
    echo check($input, $regex);
}

function check($input, $regex)
{
    if (preg_match($regex, $input, $match)) {
        $word = $match[2];
        $productGroup = null;
        foreach (range(0, strlen($word) - 1) as $i) {
            if (ctype_digit($word[$i])) {
                $productGroup .= $word[$i];
            }
        }
        $productGroup = $productGroup ?? '00';
        return 'Product group: ' . $productGroup . PHP_EOL;
    }
    return 'Invalid barcode' . PHP_EOL;
}
