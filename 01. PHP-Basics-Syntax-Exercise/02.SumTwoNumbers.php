<?php
$firstNumber = floatval(readline());
$secondNumber = floatval(readline());
$sum = $firstNumber + $secondNumber;
$result = number_format($sum, 2, '.', '');
# echo '$firstNumber + $secondNumber = ';
# echo "$firstNumber + $secondNumber = ";
# echo round($result, 2);
// echo "\$firstNumber + \$secondNumber = $firstNumber + $secondNumber = $result";
printf('$firstNumber + $secondNumber = %s + %s = %.2f', $firstNumber, $secondNumber, $sum);