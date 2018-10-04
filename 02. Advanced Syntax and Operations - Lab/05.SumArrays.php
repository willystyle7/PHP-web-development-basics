<?php
$arr1 = explode(' ', trim(readline()));
$arr1 = array_map(intval, $arr1);
$arr2 = explode(' ', trim(readline()));
$arr2 = array_map(intval, $arr2);
$arr = [];
$len = max(count($arr1), count($arr2));
for ($i = 0; $i < $len; $i++) {
	$arr[] = $arr1[$i % count($arr1)] + $arr2[$i % count($arr2)];
}
echo implode(' ', $arr);
?>