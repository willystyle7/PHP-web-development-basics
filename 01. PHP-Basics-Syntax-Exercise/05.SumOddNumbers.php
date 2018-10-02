<?php
$num = (int)(fgets(STDIN));
$sum = 0;
for ($i = 1; $i <= $num; $i++) {
	echo (2 * $i - 1).PHP_EOL;
	$sum += (2 * $i - 1);
}
echo "Sum: $sum";