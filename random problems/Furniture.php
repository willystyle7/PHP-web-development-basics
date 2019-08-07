<?php
$input = readline();
$pattern = '/^>>([A-Za-z]+)+<<(\d+\.?\d+)!(\d+)\b/';
$products = [];
$totalMoneySpend = 0;
while ($input != 'Purchase') {
    if (preg_match($pattern, $input, $arr)) {
        $products[] = $arr[1];
        $totalMoneySpend += $arr[2] * $arr[3];
    }
    $input = readline();
}
$totalMoneySpend = number_format($totalMoneySpend, 2, '.', '');
echo 'Bought furniture:' . PHP_EOL;
foreach ($products as $product) {
    echo $product . PHP_EOL;
}
echo "Total money spend: $totalMoneySpend" . PHP_EOL;
