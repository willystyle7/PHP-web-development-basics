<?php
$str = readline();
$digits = "";
$letters = "";
$others = "";
for ($i = 0; $i < strlen($str); $i++) {
	if (is_numeric($str[$i])) {
		$digits .= $str[$i];
	} else if (ctype_alpha($str[$i])) {
		$letters .= $str[$i];
	} else {
		$others .= $str[$i];
	}
}
echo $digits.PHP_EOL;
echo $letters.PHP_EOL;
echo $others.PHP_EOL;