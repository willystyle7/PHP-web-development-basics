<?php
$count = intval(readline());
$arr = [];
for ($i = 0; $i < $count; $i++) {
	$arr[] = intval(readline());
}
krsort($arr);
echo implode(' ', $arr);