<?php
$num1 = intval(readline());
$num2 = intval(readline());
for ($i = min($num1, $num2); $i <= max($num1, $num2); $i++) {
	echo $i.PHP_EOL;
}
?>