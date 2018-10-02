<?php
$num = (int)(fgets(STDIN));
$multiplier = (int)(fgets(STDIN));
for ($i = $multiplier; $i <= (($multiplier > 10) ? $multiplier : 10) ; $i++) {
	echo "$num X $i = ".($num * $i).PHP_EOL;
}