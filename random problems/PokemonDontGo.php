<?php
$arr = array_map('intval', explode(' ', readline()));
$index = intval(readline());
$sum = 0;
while (count($arr) > 0) {
    if ($index > count($arr) - 1) {
        $value = $arr[count($arr) - 1];
        array_splice($arr, count($arr) - 1, 1, $arr[0]);
    } elseif ($index < 0) {
        $value = $arr[0];
        array_splice($arr, 0, 1, $arr[count($arr) - 1]);
    } else {
        $value = $arr[$index];
        array_splice($arr, $index, 1);
    }
    $sum += $value;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] <= $value) {
            $arr[$i] += $value;
        } else {
            $arr[$i] -= $value;
        }
    }
    if (count($arr) > 0) {
        $index = intval(readline());
    }
}
echo $sum;

// <?php
// $arr = array_map('intval', explode(' ', readline()));
// $arrDeletedElements = [];
// while (true) {
//     if (count($arr) == 0) {
//         $sum = 0;
//         for($i = 0; $i < count($arrDeletedElements); $i++) {
//             $sum += $arrDeletedElements[$i];
//         }
//         echo $sum;
//         return;
//     }
//     $index = intval(readline());
// 	if ($index >= 0 && $index < count($arr)) {
// 		$valueElement = $arr[$index];
//         array_splice($arr, $index, 1);
//         $arrDeletedElements[] = $valueElement;
//         $arr = increaseOrDecrease($arr, $valueElement);
// 	} else if ($index < 0) {
// 		$valueElement = $arr[0];
//         array_splice($arr, 0, 1, $arr[count($arr)-1]);
//         $arrDeletedElements[] = $valueElement;
//         $arr = increaseOrDecrease($arr, $valueElement);
// 	} else if ($index > count($arr)-1) {
// 		$valueElement = $arr[count($arr)-1];
//         array_splice($arr, count($arr)-1, 1, $arr[0]);
//         $arrDeletedElements[] = $valueElement;
//         $arr = increaseOrDecrease($arr, $valueElement);
// 	}
// }

// function increaseOrDecrease($array, $deletedEle)
// {
//     for($i = 0; $i < count($array); $i++) {
//         if ($array[$i] <= $deletedEle) {
//             $array[$i] += $deletedEle;
//         } else {
//             $array[$i] -= $deletedEle;
//         }
//     }
//     return $array;
// }