<?php
$arr = array_map('intval', explode(" ", preg_replace('/\s+/', ' ', trim(readline()))));
 while(1) {
     $command = strtolower(preg_replace('/\s+/', ' ', trim(readline())));
	 $comm = explode(" ", $command);
     if($comm[0] == "end") {
         break;
     }     
     if($comm[0] == "get") {
         echo array_sum($arr) . PHP_EOL;
		 continue;
     }
     switch($comm[0]) {
         case 'contains':
             if(in_array(intval($comm[1]), $arr)) {
                 echo "Yes" . PHP_EOL;
             } else {
                 echo "No such number" . PHP_EOL;
             }
         break;
         case 'print':
             $num = $comm[1];
             if($num == "even") {
                 printEven($arr);
             } else if($num == "odd") {
                 printOdd($arr);
             }
         break;
         case "filter":
             $condition = $comm[1];
             $num = intval($comm[2]);
             filterArr($arr, $condition, $num);
         break;
     }
 }
echo implode(" ", $arr);
 
function filterArr($arr, $condition, $num) {
    $length = count($arr);
    $temp = [];
     for($i = 0; $i < $length; $i++) {
         if($condition === "<") {
             if($arr[$i] < $num) {
                 $temp[] = $arr[$i];
             }
         } else if($condition === ">") {
             if($arr[$i] > $num) {
                 $temp[] = $arr[$i];
             }
         } else if($condition === ">=" || $condition === "=>") {
             if($arr[$i] >= $num) {
                 $temp[] = $arr[$i];
             }
         }  else if($condition === "<=" || $condition === "=<") {
             if($arr[$i] <= $num) {
                 $temp[] = $arr[$i];
             }
         }
     }
     echo implode(" ", $temp) . PHP_EOL;
}
function printOdd($arr) {
    $temp = [];
    for($i = 0; $i < count($arr); $i++) {
        if($arr[$i] % 2 != 0) {
            $temp[] = $arr[$i];
        }
    }
    echo implode(" ", $temp) . PHP_EOL;
}
 
function printEven($arr) {
    $temp = [];
    for($i = 0; $i < count($arr); $i++) {
        if($arr[$i] % 2 == 0) {
            $temp[] = $arr[$i];
        }
    }
    echo implode(" ", $temp) . PHP_EOL;
}
 
?>