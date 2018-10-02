<?php
$num = (int)(fgets(STDIN));
for ($i = 1; $i <= 10; $i++) {
	echo "$num X $i = ".($num * $i).PHP_EOL;
}