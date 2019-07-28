<?php
$size = floatval(readline());
$sheets = intval(readline());
$areaPerSheet = floatval(readline());

$boxArea = 6 * $size * $size;
$thirdSheets = floor($sheets / 3);
# $sheetsArea = ($sheets - $thirdSheets) * $areaPerSheet + $thirdSheets * 0.25 * $areaPerSheet;
$sheetsArea = ($sheets - $thirdSheets * 0.75) * $areaPerSheet;

$percentage = number_format($sheetsArea * 100 / $boxArea, 2);

# printf("You can cover %.2f%% of the box.", $percentage);
echo "You can cover {$percentage}% of the box.";