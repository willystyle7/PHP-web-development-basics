<?php
$num1 = (double) readline();
$num2 = (double) readline();
$command = readline();
switch ($command) {
    case 'sum':
        $result = $num1 + $num2;
        break;
    case 'subtract':
        $result = $num1 - $num2;
        break;
    case 'divide':
        if ($num2 == 0) {
            $result = "Cannot divide by zero";
        } else {
            $result = $num1 / $num2;
        }
        break;
    case 'multiply':
        $result = $num1 * $num2;
        break;
    default:
        $result = "Wrong operation supplied";
        break;
}
echo $result;
