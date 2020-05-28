<?php
$arr = explode(" ", readline());
$arr = array_map('strrev', $arr);
$sum = array_sum($arr);
echo $sum;
// echo array_sum(array_map('strrev',  explode(" ", readline())));