<?php
$arr = [
    'level1' => ['0' => '', '1' => 7.863, '2' => 8.245],
    'level2' => ['0' => '', '1' => 1.522, '2' => 3.625],
    'level3' => ['0' => '', '1' => 2.158, '2' => 5.001]
];

function getValue($arr, $val) {
    $result = $arr;
    foreach ($val as $key) {
        $key = $key[0];
        if (array_key_exists($key, $result)) {
            $result = $result[$key];
        } else  {
            throw new Exception("Key $key not exist in source array!");
        }
    }
    return $result;
}

$val1 = [['level2'], [1]];
$val2 = [['level1'], [3]];
$val3 = [['level3'], [2]];

var_dump(getValue($arr, $val1));
var_dump(getValue($arr, $val2));
var_dump(getValue($arr, $val3));



