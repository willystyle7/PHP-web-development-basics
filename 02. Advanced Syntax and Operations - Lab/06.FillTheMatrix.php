<?php
$input = explode(', ', trim(readline()));
$size = intval($input[0]);
$method = $input[1];
$matrix = [];
if ($method == 'A') {
	fillMethodA($matrix, $size);
} else {
	fillMethodB($matrix, $size);
}
printMatrix($matrix, $size);

function fillMethodA(&$matrix, $size){
	$num = 1;
	for ($j = 0; $j < $size; $j++) {
		for ($i = 0; $i < $size; $i++) {
			$matrix[$i][$j] = $num++;
		}
	}
}

function fillMethodB(&$matrix, $size){
	$num = 1;
	for ($j = 0; $j < $size; $j++) {
		if ($j % 2 == 0) {
			for ($i = 0; $i < $size; $i++) {
				$matrix[$i][$j] = $num++;
			}
		} else {
			for ($i = $size - 1; $i >= 0; $i--) {
				$matrix[$i][$j] = $num++;
			}
		}		
	}
}

function printMatrix($matrix, $size){
	for ($i = 0; $i < $size; $i++) {
		echo implode(' ', $matrix[$i]).PHP_EOL;
	}
}

?>