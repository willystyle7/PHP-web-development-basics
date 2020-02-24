<?php
$n = intval(readline());
$securityKey = intval(readline());
$totalLoss = 0;
// $token = pow($securityKey, $n);
$token = bcpow($securityKey, $n);
for ($i = 0; $i < $n; $i++) {
    $visits = explode(" ", readline());
    echo "$visits[0]" . PHP_EOL;
    $siteVisits = intval($visits[1]);
    $siteCommercialIncomePerVisit = floatval($visits[2]);
    $totalLoss +=  $siteCommercialIncomePerVisit * $siteVisits;
}
// printf("Total Loss: %.20f" . PHP_EOL, round($totalLoss, 6));
// $totalLoss = number_format(round($totalLoss, 6), 20, ".", "");
// echo "Total Loss: $totalLoss" . PHP_EOL;
printf("Total Loss: %.5f" . str_repeat("0", 15) . PHP_EOL, $totalLoss);
echo "Security Token: $token" . PHP_EOL;
// printf("Security Token: %.0f" . PHP_EOL, $token);
