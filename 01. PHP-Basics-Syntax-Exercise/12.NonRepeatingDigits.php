<?php
$num = intval(readline());
$nonRepeatingDigits = [];
$arr = [];
for ($i = 102; $i <= ($num < 1000 ? $num : 999); $i++) {
	$firtsDigit=((string)$i)[0];
	$secondDigit=((string)$i)[1];
	$thirdDigit=((string)$i)[2];
	if ($firtsDigit != $secondDigit && $secondDigit != $thirdDigit && $thirdDigit != $firtsDigit) {
		$arr[] = (string)$i;
	}
}
echo count($arr) == 0 ? 'no' : implode(', ', $arr);