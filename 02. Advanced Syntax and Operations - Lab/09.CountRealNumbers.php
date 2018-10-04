<?php
$arr = explode(' ', trim(readline()));
$assocArr = [];
for ($i = 0; $i < count($arr); $i++) {
    $element = $arr[$i];
    if (!array_key_exists($element, $assocArr)) {
        $assocArr[$element] = 0;
	}
    $assocArr[$element] += 1;
}
//$arr = array_map(floatval, $arr);
ksort($assocArr);
foreach ($assocArr as $key=>$value) {
	echo $key.' -> '.$value.PHP_EOL;
}
?>