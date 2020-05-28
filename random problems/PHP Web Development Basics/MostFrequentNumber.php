<?php
// $numbers = explode(" ", readline());
// $numbers = array_map('intval', $numbers);
// $mostFrequentNumber = null;
// $maxFrequency = 0;
// $checkedNumbers = [];
// for ($i = 0; $i < count($numbers) - 1; $i++) {
//     $number = $numbers[$i];
//     if (!in_array($number, $checkedNumbers)) {
//         $checkedNumbers[] = $number;
//         $currentFrequency = 1;
//         for ($j = $i + 1; $j < count($numbers); $j++) {
//             if ($numbers[$j] === $number) {
//                 $currentFrequency++;
//             }
//         }
//         if ($currentFrequency > $maxFrequency) {
//             $mostFrequentNumber = $number;
//             $maxFrequency = $currentFrequency;
//         }
//     }
// }
// echo $mostFrequentNumber;

// another decision with assoc array
$numbers = array_map('intval', explode(" ", readline()));
$numbersFrequences = [];
foreach ($numbers as $number) {
    if (!key_exists($number, $numbersFrequences)) {
        $numbersFrequences[$number] = 0;
    }
    $numbersFrequences[$number]++;
}
arsort($numbersFrequences);
echo array_keys($numbersFrequences)[0];