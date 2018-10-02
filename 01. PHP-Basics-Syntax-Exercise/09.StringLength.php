<?php
$str = (string)trim((fgets(STDIN)));
$strLength = strlen($str);
if ($strLength >= 20) {
	$str = substr($str, 0, 20);
} else {
	$str = $str.str_repeat('*', (20 - $strLength));
}	
echo $str;