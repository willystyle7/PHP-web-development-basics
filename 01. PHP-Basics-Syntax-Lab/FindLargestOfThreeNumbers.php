<?php
$num1 = intval(fgets(STDIN));
$num2 = intval(fgets(STDIN));
$num3 = intval(fgets(STDIN));
$max = max([$num1, $num2, $num3]);
echo $max;