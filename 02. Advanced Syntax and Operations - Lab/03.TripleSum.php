<?php
$arr = explode(' ', trim(readline()));
$arr = array_map(intval, $arr);
$found = false;
for ($i = 0; $i < count($arr) - 1; $i++) {
	for ($j = $i + 1; $j < count($arr); $j++) {
		if (in_array($arr[$i] + $arr[$j], $arr)) {
			$found = true;
			echo "$arr[$i] + $arr[$j] == ".($arr[$i] + $arr[$j]).PHP_EOL;
		}
	}
}
if (!$found) {
	echo 'No';
}

?>