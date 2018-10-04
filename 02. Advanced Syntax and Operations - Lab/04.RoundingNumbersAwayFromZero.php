<?php
$arr = explode(' ', trim(readline()));
//$arr = array_map(floatval, $arr);
foreach ($arr as $num) {
	echo $num.' => '.round(floatval($num), 0, PHP_ROUND_HALF_UP).PHP_EOL;
}
?>