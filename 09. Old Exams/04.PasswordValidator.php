<?php
$pass = readline();
foreach (validatePass($pass) as $output) {
    echo $output . PHP_EOL;
}

function validatePass($password)
{
    $length = validateLength($password);
    $lettersAndDigits = validateLetters($password);
    $digits = validateDigits($password);
    $output = [];
    if (!$length) {
        $output[] = "Password must be between 6 and 10 characters";
    }
    if (!$lettersAndDigits) {
        $output[] = "Password must consist only of letters and digits";
    }
    if (!$digits) {
        $output[] = "Password must have at least 2 digits";
    }
    if ($length && $lettersAndDigits && $digits) {
        $output[] = "Password is valid";
    }
    return $output;

}
function validateLength($pass)
{
    if (strlen($pass) >= 6 && strlen($pass) <= 10) {
        return true;
    } else {
        return false;
    }
}
function validateLetters($pass)
{
    if (preg_match('/^[A-Za-z0-9]+$/', $pass)) {
        return true;
    } else {
        return false;
    }
}
function validateDigits($pass)
{
    if (preg_match('/(?=(.*\d){2})/', $pass)) {
        return true;
    } else {
        return false;
    }
}
