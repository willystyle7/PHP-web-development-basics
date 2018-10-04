<?php
$arr = explode(', ', trim(readline()));
$assocArr = [];
$unique = [];
for ($i = 0; $i < count($arr); $i++) {
    $element = $arr[$i];
    if (!array_key_exists($element, $assocArr)) {
        $assocArr[$element] = 0;
	}
    $assocArr[$element] += 1;
}
foreach ($assocArr as $key=>$value) {
	if ($value == 1) {
		$unique[] = $key;
	}
}
echo implode(' ', $unique).PHP_EOL;
?>